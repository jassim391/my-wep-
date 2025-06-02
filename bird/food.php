<?php
session_start();
include 'include/db.php'; // الاتصال بقاعدة البيانات

// جلب منتجات الطيور فقط
$sql = "SELECT p.* FROM products p
        JOIN category c ON p.fk_category = c.category_id
        WHERE c.name = 'طعام'";
$result = $conn->query($sql);

$count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>بيع الطيور</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'include/header.php'; ?>

<a class="cart-link" href="cart.php">🛒 السلة (<?= $count ?>)</a>

<h2>بيع الطيور</h2>
<div class="cards-container">
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card">
                <img src="<?= htmlspecialchars($row["image"]) ?>" alt="<?= htmlspecialchars($row["name"]) ?>">
                <h3><?= htmlspecialchars($row["name"]) ?></h3>
                <p><?= htmlspecialchars($row["description"]) ?></p>
                <p>السعر: <?= htmlspecialchars($row["price"]) ?> دينار</p>
                <form method="post" action="add_to_cart.php">
                    <input type="hidden" name="product_id" value="<?= $row["product_id"] ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit">🛒 أضف إلى السلة</button>
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>لا توجد طيور متاحة حالياً</p>
    <?php endif; ?>
</div>

</body>
</html>
