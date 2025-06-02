<!-- footer.php -->
<!-- بداية الفوتر -->
<!-- تضمين مكتبات Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- مكتبات إضافية -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="js/script.js"></script> <!-- استدعاء ملف الجافا سكريبت الخارجي -->
<style>
    .custom-footer{
        background-color:red;
    }
    html, body {
  height: 100%;
}

footer {
  flex-shrink: 0;
}
.content {
  flex: 1 0 auto;
}
</style>

<!-- الفوتر -->
<footer class="custom-footer text-white pt-4 pb-2">
    <div class="container">
        <div class="row text-center text-md-start">
            <!-- معلومات عن الموقع -->
            <div class="col-12 col-md-4 mb-4">
                <img src="imge/logo2.png" alt="Logo" class="mb-3" style="max-width: 150px;">
                <p>نحن نقدم أفضل المنتجات لراحة منزلك. تفضل بزيارة متجرنا لاكتشاف المزيد.</p>
            </div>

            <!-- روابط سريعة -->
            <div class="col-12 col-md-4 mb-4">
                <h5 class="mb-3">روابط سريعة</h5>
                <ul class="list-unstyled">
                    <li><a href="#home" class="text-white text-decoration-none d-block py-1">الصفحة الرئيسية</a></li>
                    <li><a href="#about" class="text-white text-decoration-none d-block py-1">من نحن</a></li>
                    <li><a href="#services" class="text-white text-decoration-none d-block py-1">الخدمات</a></li>
                    <li><a href="#contact" class="text-white text-decoration-none d-block py-1">اتصل بنا</a></li>
                </ul>
            </div>

            <!-- وسائل التواصل الاجتماعي -->
            <div class="col-12 col-md-4 mb-4">
                <h5 class="mb-3">تابعنا</h5>
                <a href="https://www.facebook.com" class="d-block text-white text-decoration-none py-1">فيسبوك</a>
                <a href="https://www.instagram.com" class="d-block text-white text-decoration-none py-1">إنستغرام</a>
                <a href="https://twitter.com" class="d-block text-white text-decoration-none py-1">تويتر</a>
            </div>
        </div>

        <div class="text-center mt-4 border-top pt-3">
            <p class="mb-0">&copy; 2025 جميع الحقوق محفوظة لموقعك.</p>
        </div>
    </div>
</footer>

</body>
</html>
