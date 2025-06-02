<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../index.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brids_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// --- تصفية حسب الفئة (رقم الفئة) ---
$category = isset($_GET['category']) ? intval($_GET['category']) : 0;

$sql = "SELECT * FROM products";
if ($category > 0) {
    $sql .= " WHERE fk_category = $category";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>المنتجات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">قائمة المنتجات <?= $category ? " - الفئة رقم $category" : "" ?></h2>

    <div class="mb-3">
        <a href="products.php" class="btn btn-secondary btn-sm">الكل</a>
        <a href="products.php?category=1" class="btn btn-outline-primary btn-sm">الإكسسوارات</a>
        <a href="products.php?category=2" class="btn btn-outline-primary btn-sm">الطيور</a>
        <a href="products.php?category=3" class="btn btn-outline-primary btn-sm">الطعام</a>
        <a href="add_product.php" class="btn btn-success btn-sm float-end"><i class="fas fa-plus"></i> إضافة منتج</a>
    </div>

    <div class="row">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php if (!empty($row['image'])): ?>
                            <img src="<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="صورة المنتج" style="height:200px; object-fit:cover;">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                            <p class="text-muted">السعر: BD<?= number_format($row['price'], 2) ?></p>
                            <p>الكمية في المخزون: <?= intval($row['stock']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info">لا توجد منتجات في هذه الفئة.</div>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
