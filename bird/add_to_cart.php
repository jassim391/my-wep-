<?php
session_start();

// التحقق من وجود البيانات المطلوبة
if (!isset($_POST['product_id']) || !isset($_POST['name']) || !isset($_POST['price'])) {
    die("❌ بيانات غير مكتملة.");
}

// استلام البيانات
$product_id   = (int) $_POST['product_id'];
$product_name = $_POST['name'];
$product_price = (float) $_POST['price'];
$quantity     = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1;

// التأكد من وجود السلة
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// التحقق إذا كان المنتج موجود مسبقًا في السلة (لتحديث الكمية بدل تكراره)
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['id'] === $product_id) {
        $item['quantity'] += $quantity;
        $found = true;
        break;
    }
}
unset($item); // تفادي مرجعية foreach

// إذا المنتج جديد أضفه للسلة
if (!$found) {
    $_SESSION['cart'][] = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $quantity
    ];
}

// إعادة التوجيه إلى صفحة السلة
header("Location: cart.php");
exit;
