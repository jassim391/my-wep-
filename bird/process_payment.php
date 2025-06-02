<?php
// إعداد الاتصال بقاعدة البيانات
$host = "localhost";
$username = "root"; // اسم المستخدم (افتراضي في XAMPP هو 'root')
$password = "";     // كلمة المرور (افتراضي في XAMPP فارغة)
$dbname = "donations_db"; // اسم قاعدة البيانات التي أنشأتها

// إنشاء الاتصال
$conn = new mysqli($host, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استلام البيانات بتنسيق JSON
$data = json_decode(file_get_contents('php://input'), true);

// التحقق من وجود جميع البيانات
if (isset($data['donor_name'], $data['phone'], $data['email'], $data['gender'], $data['total'], $data['cart'])) {
    // استخراج البيانات
    $donor_name = $data['donor_name'];
    $phone = $data['phone'];
    $email = $data['email'];
    $gender = $data['gender'];
    $total = $data['total'];
    $cart = $data['cart'];

    // إدخال بيانات المتبرع إلى جدول donations
    $stmt = $conn->prepare("INSERT INTO donations (donor_name, phone, email, gender, total) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $donor_name, $phone, $email, $gender, $total);
    if ($stmt->execute()) {
        // استلام ID المتبرع الذي تم إدخاله
        $donation_id = $stmt->insert_id;

        // إدخال بيانات سلة المشتريات إلى جدول cart_items
        foreach ($cart as $item) {
            $product_name = $item['name'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $item_total = $item['total'];

            $stmt = $conn->prepare("INSERT INTO cart_items (donation_id, product_name, price, quantity, total) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("isdds", $donation_id, $product_name, $price, $quantity, $item_total);
            $stmt->execute();
        }

        // استجابة بنجاح
        echo json_encode(['success' => true, 'message' => 'تم استلام البيانات بنجاح']);
    } else {
        // في حالة حدوث خطأ أثناء إدخال بيانات المتبرع
        echo json_encode(['success' => false, 'message' => 'حدث خطأ أثناء معالجة البيانات']);
    }
} else {
    // إذا كانت البيانات غير مكتملة
    echo json_encode(['success' => false, 'message' => 'بيانات غير مكتملة']);
}

// إغلاق الاتصال
$conn->close();
?>
