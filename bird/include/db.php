<?php
$conn = new mysqli("localhost", "root", "", "brids_db");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>