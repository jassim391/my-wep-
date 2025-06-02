<?php include 'include/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
   .object-fit-cover {
    object-fit: cover;
  }

.swiper-container {
  max-width: 100%;
  height: 300px; /* تحكم في الارتفاع */
  overflow: hidden;
}

.swiper-img {
  height: 100%;
  width: 100%;
  object-fit: cover;
  object-position: center;
  border-radius: 10px;
}
@media (max-width: 768px) {
  #carouselExample .carousel-inner {
    height: 180px;
  }
}
</style>
<!--Start Best Seller-->
<div id="best-seller" class="section py-5">
  <div class="container">
    
    <!-- السويبر داخل نفس الصفحة -->
   <!-- أضف هذا داخل مكان السويبر في صفحة الأكثر مبيعاً -->
   <div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner rounded-4 overflow-hidden" style="height: 280px;">
    <div class="carousel-item active">
      <img src="imge/bird4.jpeg" class="d-block w-100 h-100 object-fit-cover" alt="صورة 1">
    </div>
    <div class="carousel-item">
      <img src="imge/bird2.jpg" class="d-block w-100 h-100 object-fit-cover" alt="صورة 2">
    </div>
    <div class="carousel-item">
      <img src="imge/bird3.jpg" class="d-block w-100 h-100 object-fit-cover" alt="صورة 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </button>
</div>



   <!-- عنوان -->
<h2 class="mb-4 text-center">الأكثر مبيعاً</h2>

<!-- البطاقات -->
<div class="row g-4">
  <div class="col-6 col-md-3">
    <div class="card h-100 d-flex flex-column">
      <img src="imge/test1.png" alt="بطاقة 1" class="card-img-top img-fluid">
      <div class="card-body text-center">
        <h3 class="h5">عنوان البطاقة 1</h3>
        <p>وصف البطاقة 1</p>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card h-100 d-flex flex-column">
      <img src="imge/bird2.jpg" alt="بطاقة 2" class="card-img-top img-fluid">
      <div class="card-body text-center">
        <h3 class="h5">عنوان البطاقة 2</h3>
        <p>وصف البطاقة 2</p>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card h-100 d-flex flex-column">
      <img src="imge/bird3.jpg" alt="بطاقة 3" class="card-img-top img-fluid">
      <div class="card-body text-center">
        <h3 class="h5">عنوان البطاقة 3</h3>
        <p>وصف البطاقة 3</p>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card h-100 d-flex flex-column">
      <img src="imge/test1.png" alt="بطاقة 4" class="card-img-top img-fluid">
      <div class="card-body text-center">
        <h3 class="h5">عنوان البطاقة 4</h3>
        <p>وصف البطاقة 4</p>
      </div>
    </div>
  </div>
</div>

<!--End Best Seller-->

  <!--Start About-->
  <div id="about" class="section py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 about-text">
          <h2>من نحن</h2>
          <p>نحن شركة متخصصة في تقديم أفضل المنتجات والخدمات لعملائنا، ونسعى دائمًا لتوفير تجربة فريدة ومميزة.</p>
          <p>تأسس موقعنا على مبدأ الثقة والجودة، ونعمل بجد لضمان رضا عملائنا من خلال تقديم خدمات مميزة ودعم مستمر.</p>
        </div>
        <div class="col-md-6 about-image" data-aos="zoom-in">
          <img src="imge/snapedit_1739816106141.png" alt="صورة فريق العمل" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </div>
  <!--End About-->

  <!--Start Services-->
  <div id="services" class="section bg-light py-5 py-lg-3">
  <div class="container">
    <h2 class="text-center mb-4 mb-lg-3">خدماتنا</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mb-lg-3">
      <div class="col">
        <a href="birds.php" class="text-decoration-none text-dark h-100 d-block">
          <div class="card h-100 text-center">
            <img src="imge/sell.webp" class="card-img-top img-fluid" alt="خدمة 1">
            <div class="card-body">
              <h3 class="card-title">خدمة 1</h3>
              <p class="card-text">بيع الطيور</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="Accessories.php" class="text-decoration-none text-dark h-100 d-block">
          <div class="card h-100 text-center">
            <img src="imge/Accessories.webp" class="card-img-top img-fluid" alt="خدمة 2">
            <div class="card-body">
              <h3 class="card-title">خدمة 2</h3>
              <p class="card-text">ملحقات الطيور</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="food.php" class="text-decoration-none text-dark h-100 d-block">
          <div class="card h-100 text-center">
            <img src="imge/food.webp" class="card-img-top img-fluid" alt="خدمة 3">
            <div class="card-body">
              <h3 class="card-title">خدمة 3</h3>
              <p class="card-text">أنواع الطعام والتغذية الخاصة بالطيور</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>



  <!--End Services-->

  <!--Start Contact-->
  <!-- قسم التواصل -->
<section id="contact" class="section bg-light py-5 py-lg-3">
  <div class="container">
    <h2 class="text-center mb-3 mb-lg-2">تواصل معنا</h2>
    <p class="text-center mb-5 mb-lg-3">نتشرف بتواصلكم معنا</p>

    <!-- الخريطة والنموذج -->
    <div class="row g-4 align-items-start mb-5 mb-lg-3">
      <!-- الخريطة -->
      <div class="col-12 col-md-6">
        <div class="ratio ratio-16x9">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.8090448741786!2d50.61102831513058!3d26.24934528341581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49af954c5eeb0d%3A0x4d2b9ad4dd10f3f9!2z2KzZhtmK2KfYqNmG2YrZhiDYp9mE2YXYuNin2YTZitip!5e0!3m2!1sar!2s!4v1670000000000"
            allowfullscreen="" loading="lazy" style="border:0;" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>

      <!-- نموذج الاتصال -->
      <div class="col-12 col-md-6">
        <form>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="الاسم الثلاثي" required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="البريد الإلكتروني" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="رقم الموبايل" required>
          </div>
          <div class="mb-3">
            <textarea class="form-control" rows="4" placeholder="محتوى الرسالة" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-100">
            <i class="fas fa-paper-plane"></i> إرسال الرسالة
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- فاصل البطاقات -->
<div class="bg-white py-5 py-lg-3 border-top border-2 border-light shadow-sm">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 text-center g-4">
      <div class="col">
        <i class="fas fa-map-marker-alt fa-2x mb-2 d-block mx-auto text-primary"></i>
        <h3 class="fs-5">العنوان</h3>
        <p class="mb-0">المحرق - مملكة البحرين</p>
      </div>
      <div class="col">
        <i class="fas fa-phone-alt fa-2x mb-2 d-block mx-auto text-primary"></i>
        <h3 class="fs-5">أرقام التواصل</h3>
        <p class="mb-0">+973 17113115</p>
      </div>
      <div class="col">
        <i class="fas fa-fax fa-2x mb-2 d-block mx-auto text-primary"></i>
        <h3 class="fs-5">فاكس</h3>
        <p class="mb-0">+973 17000017</p>
      </div>
      <div class="col">
        <i class="fas fa-envelope fa-2x mb-2 d-block mx-auto text-primary"></i>
        <h3 class="fs-5">البريد الإلكتروني</h3>
        <p class="mb-0">brids-bh@moe.bh</p>
      </div>
    </div>
  </div>
</div>




  <!--End Contact-->

</div>
<!-- نهاية محتوى الصفحة -->

<?php include 'include/footer.php'; ?>
