<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>سلة المشتريات</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2, h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }

        .remove-btn {
            background: red;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.6);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 600px;
            position: relative;
        }

        .popup-content input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .popup-content button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #999;
        }

        .close-btn:hover {
            color: black;
        }

        .btns {
            text-align: center;
            margin-top: 20px;
        }

        .btns button, .btns a {
            margin: 5px;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            text-decoration: none;
            color: white;
        }

        .btn-clear { background-color: #dc3545; }
        .btn-back { background-color: #007bff; }
        .btn-checkout { background-color: #ffc107; color: black; }
    </style>
</head>
<body>

<h2>🛒 سلة المشتريات</h2>

<?php if (count($cart) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>المنتج</th>
                <th>السعر</th>
                <th>الكمية</th>
                <th>الإجمالي</th>
                <th>إزالة</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['price'] ?> دينار</td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= $item['price'] * $item['quantity'] ?> دينار</td>
                    <td>
                    <a href="remove_from_cart.php?id=<?= $item['id'] ?>" class="remove-btn">X</a>
                    </td>
                </tr>
                <?php $total += $item['price'] * $item['quantity']; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>الإجمالي الكلي: <?= $total ?> دينار</h3>

    <div class="btns">
        <a href="clear_cart.php" class="btn-clear">مسح السلة</a>
        <a href="index.php" class="btn-back">العودة للتسوق</a>
        <button class="btn-checkout" onclick="openPopup()">إتمام الطلب</button>
    </div>
<?php else: ?>
    <p style="text-align: center;">السلة فارغة 🕊️</p>
    <div class="btns">
        <a href="index.php" class="btn-back">العودة للتسوق</a>
    </div>
<?php endif; ?>

<!-- نافذة الدفع -->
<div id="checkout-popup" class="popup">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">×</span>
        <h3>إتمام عملية الطلب</h3>

        <form method="POST" action="checkout.php">
            <input type="text" name="donor_name" placeholder="اسم العميل" required>
            <div style="display: flex; gap: 5px;">
                <select name="country_code" required>
                    <option value="973">973</option>
                    <option value="966">966</option>
                    <option value="20">20</option>
                </select>
                <input type="tel" name="phone" placeholder="رقم الهاتف" required>
            </div>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>

            <div style="margin-bottom: 10px;">
                <label><input type="radio" name="gender" value="ذكر" required> ذكر</label>
                <label style="margin-right: 20px;"><input type="radio" name="gender" value="أنثى"> أنثى</label>
            </div>

            <input type="hidden" name="cart" id="cart-json">
            <button type="button" onclick="submitCheckout()">تأكيد الطلب</button>
        </form>
    </div>
</div>

<script>
function openPopup() {
    document.getElementById("checkout-popup").style.display = "flex";
}
function closePopup() {
    document.getElementById("checkout-popup").style.display = "none";
}

// مثال على بيانات السلة (يفترض أنك تعبيها من كودك فعلياً)
let cart = [
    { name: "ببغاء أفريقي", product_id: 3, quantity: 1, price: 40 },
    { name: "أكل طيور", product_id: 8, quantity: 2, price: 5 }
];

function submitCheckout() {
    const cartField = document.getElementById("cart-json");
    cartField.value = JSON.stringify(cart); // تحويل السلة إلى JSON
    document.querySelector('#checkout-popup form').submit(); // إرسال النموذج
}
</script>

</body>
</html>
