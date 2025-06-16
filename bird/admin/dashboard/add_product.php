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

// جلب الفئات من قاعدة البيانات
$categories = $conn->query("SELECT * FROM category");

// عند إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);
    $fk_category = intval($_POST['fk_category']);
    
    $imagePath = "";

   // رفع الصورة
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $uploadDir = '../../uploads/';
    $fileName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $imagePath = $fileName; // فقط اسم الصورة
    }
}

    // إدخال المنتج في قاعدة البيانات
    $sql = "INSERT INTO products (name, description, price, stock, fk_category, image)
            VALUES ('$name', '$description', $price, $stock, $fk_category, '$imagePath')";

if ($conn->query($sql) === TRUE) {
    header("Location: add_product.php?success=1");
} else {
    $error = "حدث خطأ أثناء الإضافة: " . $conn->error;
}
}
?>

<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>إضافة منتج جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include '../../include/nav-bar.php'; ?>

    <div class="container py-5">
    <h2 class="text-center mb-4 text-success">إضافة منتج جديد</h2>

    <!-- ✅ رسالة النجاح خارج الفورم -->
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ تم إضافة المنتج بنجاح.
    </div>
<?php endif; ?>

    <!-- ✅ رسالة الخطأ -->
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label class="form-label">اسم المنتج</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">الوصف</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">السعر (BD)</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">الكمية في المخزون</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">الفئة</label>
            <select name="fk_category" class="form-select" required>
                <option value="">اختر فئة</option>
                <?php while ($cat = $categories->fetch_assoc()): ?>
                    <option value="<?= $cat['category_id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">صورة المنتج</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">إضافة المنتج</button>
        </div>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const alertBox = document.querySelector('#successAlert');

    if (alertBox) {
        // ⏳ إخفاء التنبيه بعد 3 ثوانٍ
        setTimeout(() => {
            alertBox.classList.remove('show');
            alertBox.classList.add('fade');
        }, 3000);

        // 🧹 تفريغ النموذج بعد 3.5 ثوانٍ
        setTimeout(() => {
            const form = document.querySelector("form");
            if (form) form.reset();
        }, 3500);

        // 🔁 إعادة توجيه للصفحة الأصلية بدون ?success بعد 4 ثوانٍ
        setTimeout(() => {
            window.location.href = "add_product.php";
        }, 4000);
    }
});
</script>
✅ النتيجة النهائية:
