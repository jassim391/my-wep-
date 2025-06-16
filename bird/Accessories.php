<?php
session_start();
include 'include/db.php'; // الاتصال بقاعدة البيانات

// جلب منتجات الفئة "طيور"
$sql = "SELECT p.* FROM products p
        JOIN category c ON p.fk_category = c.category_id
        WHERE c.name = 'إكسسوارات'";
$result = $conn->query($sql);

$count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بيع الطيور</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'include/header.php'; ?>

<div class="container py-4">

    <!-- رابط السلة -->
    <div class="text-end mb-4">
        <a href="cart.php" class="btn btn-outline-dark">
            🛒 السلة (<?= $count ?>)
        </a>
    </div>

    <!-- عنوان الصفحة -->
    <h2 class="text-center mb-4 text-success">منتجات الطيور</h2>

    <div class="row">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php if (!empty($row["image"])): ?>
                        <img src="uploads/<?= htmlspecialchars(basename($row["image"])) ?>" class="card-img-top" alt="<?= htmlspecialchars($row["name"]) ?>" style="height: 200px; object-fit: cover;">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($row["name"]) ?></h5>
                            <p class="card-text"><?= mb_strimwidth(htmlspecialchars($row["description"]), 0, 100, "...") ?></p>
                            <p class="fw-bold text-primary">السعر: <?= number_format($row["price"], 2) ?> دينار</p>
                            <form method="post" action="add_to_cart.php" class="mt-auto">
                                <input type="hidden" name="product_id" value="<?= $row["product_id"] ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success w-100">🛒 أضف إلى السلة</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info text-center">لا توجد طيور متاحة حالياً.</div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
