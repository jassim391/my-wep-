function toggleMenu() {
    var menu = document.getElementById('mobileMenu');
    menu.classList.toggle('active');
}

document.addEventListener("DOMContentLoaded", function () {
    // تهيئة Swiper
    const swiper = new Swiper('.swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            init: function() {
                const slides = document.querySelectorAll('.swiper-slide');
                slides.forEach((slide, index) => {
                    slide.style.animation = `fadeIn 1.5s ease-out forwards`;
                    slide.style.animationDelay = `${index * 0.2}s`; 
                });
            },
        },
    });

    // تحديد الأقسام والروابط في القائمة
    const sections = document.querySelectorAll('.section');
    const navLinks = document.querySelectorAll('.navbar a');

    // تابع لمراقبة التمرير
    window.addEventListener('scroll', () => {
        let currentSection = '';

        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if (pageYOffset >= sectionTop - sectionHeight / 3) {
                currentSection = section.getAttribute('id');
            }
        });

        // إزالة الـ active class من جميع الروابط
        navLinks.forEach((link) => {
            link.classList.remove('active');
        });

        // إضافة الـ active class للرابط النشط
        navLinks.forEach((link) => {
            if (link.getAttribute('href').includes(currentSection)) {
                link.classList.add('active');
            }
        });
    });

    // تهيئة مكتبة AOS
    AOS.init({
        duration: 1000, // مدة التأثير 1 ثانية
        once: true      // يحدث التأثير مرة واحدة فقط
    });
});


// فتح النموذج
function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "block"; // عرض النموذج
}

// إغلاق النموذج
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "none"; // إخفاء النموذج
}

// إغلاق النموذج عند الضغط خارج محتوى النموذج
window.onclick = function(event) {
    var modal = document.getElementById('sellModal');
    if (event.target == modal) {
        modal.style.display = "none"; // إخفاء النموذج إذا تم الضغط في أي مكان خارج النموذج
    }
}
