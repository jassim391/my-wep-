<?php
session_start();
// تدمير جميع بيانات الجلسة
session_unset();
session_destroy();

// إعادة التوجيه لصفحة تسجيل الدخول (أو الصفحة الرئيسية)
header("Location: ../index.php");
exit;
?>
