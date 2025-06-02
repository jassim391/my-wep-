<?php
session_start();
$conn = new mysqli("localhost", "root", "", "brids_db");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['customer_name'] ?? '';
    $email = $_POST['customer_email'] ?? '';
    $phone = $_POST['customer_phone'] ?? '';
    $cart = $_SESSION['cart'] ?? [];

    // التحقق من البيانات
    if (empty($name) || empty($email) || empty($phone) || empty($cart)) {
        die("❌ جميع الحقول مطلوبة والسلة لا يمكن أن تكون فارغة!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ البريد الإلكتروني غير صالح!");
    }

    // إنشاء الطلب
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_email, customer_phone, order_date, status) 
                            VALUES (?, ?, ?, NOW(), 'pending')");
    $stmt->bind_param("sss", $name, $email, $phone);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // إدخال تفاصيل الطلب
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    foreach ($cart as $item) {
        $pid = $item['id'];
        $qty = $item['quantity'];
        $price = $item['price'];

        $stmt->bind_param("iiid", $order_id, $pid, $qty, $price);
        $stmt->execute();
    }
    $stmt->close();

    // تفريغ السلة
    unset($_SESSION['cart']);
    echo "✅ تم تنفيذ الطلب بنجاح! رقم الطلب: #$order_id";
    exit;
}

$conn->close();
?>
