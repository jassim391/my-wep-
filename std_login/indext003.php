<?php
// Connect To The Server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

$conn= new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['submit'])){
// Call Variables From HTML Page
$student_email = $_GET['student_email'];
$password   = $_GET['password'];


$sql = "SELECT *
        FROM student_tb
        WHERE students_email = '$student_email'
        AND   students_password = '$password'
        ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $newURL = 'index.html';
    header('Location: '.$newURL);
    exit();
} else {
  echo "0 results";
}
$conn->close();

}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
        <!DOCTYPE html>
<html lang="en">
<body>
    <center>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create a new account</title>
    <center>
    <style>



        .login-container {

            background-color: #fff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .login-container h2 {
            text-align: center;
            color: #333;
        }

        .login-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #007bff;
            color: #fff;
            scrollbar-shadow-color : 100px;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;

        }
</center>
    </style>
    </center>
</body>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="GET" class="login-form">
             <div class="form-group">
                <label for="password">Login Page:</label>
                <input type="text" id="password" name="student_email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                 <button type="submit"name="submit"=  >Login</button><a href="indext002.php">    <button type="button" class="button" width=100>Back</button></a>
            </div>
            <div class="form-group">
            	
            </div>
   </body>        
</html>