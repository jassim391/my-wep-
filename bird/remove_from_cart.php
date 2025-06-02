<?php
session_start();

$id = $_GET['id'] ?? null;

if ($id !== null && isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // ترتيب العناصر من جديد
            break;
        }
    }
}

header("Location: cart.php");
exit;
