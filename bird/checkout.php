<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root"; // غيّر إذا لزم الأمر
$password = "";     // غيّر إذا لزم الأمر
$dbname = "brids_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("❌ فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من الطلب
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على بيانات العميل
    $donor_name   = $_POST['donor_name'] ?? '';
    $phone        = $_POST['phone'] ?? '';
    $email        = $_POST['email'] ?? '';
    $gender       = $_POST['gender'] ?? '';
    $country_code = $_POST['country_code'] ?? '';
    $cart         = json_decode($_POST['cart'] ?? '[]', true);  // تحويل البيانات إلى مصفوفة

    // تحقق من أن جميع الحقول تم إرسالها
    if (empty($donor_name) || empty($phone) || empty($email) || empty($gender) || empty($country_code) || empty($cart)) {
        die("❌ جميع الحقول مطلوبة!");
    }

    // دمج كود الدولة مع رقم الهاتف
    $full_phone = "" . $country_code . $phone;

    // إدخال الطلب في جدول orders
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_email, customer_phone, gender) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("❌ خطأ في إعداد استعلام الطلب: " . $conn->error);
    }
    $stmt->bind_param("ssss", $donor_name, $email, $full_phone, $gender);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // إدخال تفاصيل الطلب في جدول order_items
    $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    if (!$stmt_item) {
        die("❌ خطأ أثناء تحضير استعلام order_items: " . $conn->error);
    }

    // التحقق من كل منتج في السلة وإدخاله في جدول order_items
    foreach ($cart as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];
        $price = $item['price'];

        // تحقق من أن المنتج موجود فعلاً في قاعدة البيانات
        $check = $conn->prepare("SELECT id FROM products WHERE id = ?");
        $check->bind_param("i", $product_id);
        $check->execute();
        $check->store_result();

        if ($check->num_rows == 0) {
            echo "❌ المنتج مع ID $product_id غير موجود في قاعدة البيانات.<br>";
            $check->close();
            continue;
        }
        $check->close();

        // إدخال تفاصيل الطلب في order_items
        $stmt_item->bind_param("iiid", $order_id, $product_id, $quantity, $price);
        if (!$stmt_item->execute()) {
            echo "❌ خطأ أثناء إدخال تفاصيل الطلب: " . $stmt_item->error . "<br>";
        }
    }

    $stmt_item->close();
    $conn->close();

    // إظهار رسالة النجاح
    echo "✅ تم إتمام الطلب بنجاح!";
} else {
    echo "❌ الطلب غير صالح!";
}
?>
