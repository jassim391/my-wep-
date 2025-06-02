<?php
include '../include/db.php';

$email = 'ali@gmail.com'; 
$new_password = 'ja12345678';

$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// إضافة مستخدم جديد (insert)
$stmt = $conn->prepare("INSERT INTO admins (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
    echo "تم إنشاء المستخدم $email بنجاح.";
} else {
    echo "حدث خطأ أثناء إنشاء المستخدم.";
}
?>
