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

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// تصفية حسب الفئة
$category = isset($_GET['category']) ? intval($_GET['category']) : 0;

$sql = "SELECT * FROM products";
if ($category > 0) {
    $sql .= " WHERE fk_category = $category";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - المنتجات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-light">

    <?php include '../../include/nav-bar.php'; ?>

    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="text-primary">مرحباً بك: <?php echo htmlspecialchars($_SESSION['admin_name'] ?? 'المشرف'); ?></h1>
            <p class="text-muted">نوع الحساب: Administrator</p>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">قائمة المنتجات <?= $category ? " - الفئة رقم $category" : "" ?></h3>
            <a href="add_product.php" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> إضافة منتج
            </a>
        </div>

        <div class="row">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
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
                    <div class="alert alert-info text-center">لا توجد منتجات في هذه الفئة حالياً.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
