<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقعي</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
    .collapse.navbar-collapse {
        justify-content: center !important;
        gap: 120px;
    }
    .navbar-collapse {
  width: 120%; /* تخلي القائمة تأخذ عرض كامل الحاوية */
  padding-left: 4rem;  /* زيادة المسافة من اليسار */
  padding-right: 4rem; /* زيادة المسافة من اليمين */
}
.navbar {
  background-color: #f8f9fa; /* لون الخلفية */
  min-height: 100px; /* زيادة الارتفاع */
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}
.navbar-brand{
    margin-top:-10px;
}

    
</style>


<!-- Bootstrap 5 CSS و JS يجب أن تكون مفعّلة -->

<nav class="navbar navbar-expand-lg" style="background-color: #f8f9fa;">
    <div class="container position-relative">

        <!-- زر منيو الهاتف (Offcanvas) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu"
            aria-controls="mobileMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- الشعار في المنتصف -->
        <a class="navbar-brand position-absolute top-50 start-50 translate-middle" href="#">
            <img src="imge/snapedit_1739816106141.png" alt="شعار الموقع" style="height: 100px;">
        </a>

        <!-- الروابط لسطح المكتب -->
        <div class="collapse navbar-collapse justify-content-between d-none d-lg-flex">
            <!-- يمين -->
            <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="#home">الرئيسية</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#about">من نحن</a>
    </li>
</ul>
            <!-- يسار -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#services">الخدمات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">اتصل بنا</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- قائمة الجوال (Offcanvas) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">القائمة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="إغلاق"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#home">الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">من نحن</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#services">الخدمات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">اتصل بنا</a>
            </li>
        </ul>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
document.querySelectorAll('.offcanvas a.nav-link').forEach(link => {
    link.addEventListener('click', function (e) {
        const targetId = this.getAttribute('href');

        // تأكد أنه رابط داخلي يبدأ بـ #
        if (targetId && targetId.startsWith('#')) {
            e.preventDefault(); // لا تذهب للرابط مباشرة

            // أغلق القائمة أولاً
            const offcanvasEl = document.getElementById('mobileMenu');
            const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasEl);
            if (offcanvas) {
                offcanvas.hide();

                // انتظر حتى يتم إغلاق القائمة فعلياً ثم نفذ التمرير
                offcanvasEl.addEventListener('hidden.bs.offcanvas', function handler() {
                    const target = document.querySelector(targetId);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                    offcanvasEl.removeEventListener('hidden.bs.offcanvas', handler);
                });
            }
        }
    });
});
</script>

</body>
</html>

