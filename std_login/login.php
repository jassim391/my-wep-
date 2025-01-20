<?php

// Connect To The Server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['submit'])){

// Call Variables From HTML Page
 $email    = $_GET['email'];
 $password = $_GET['password'];


// Check The Table of USERS
$sql = "SELECT email, password
        FROM users_tb
        WHERE email = '$email'
        AND   password = '$password'
        ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $password = $row["password"].'<br>';
    echo $email    = $row["email"]. '<br>';
    echo "<h1>Welcome Mr. $name </h1><h2 style='color:green;'>Successfully Login</h2>";
    header("Location: index.html", true, 301);
    exit();
  }
} else {
  echo "Error - 404 - Please Check Your id & Password.";
  
}
$conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Background Image Example</title>
<link rel="stylesheet" href="styles.css">
<style>

body {
  background-image: url('pexels-photo-414171.jpeg'); /* Replace 'background.jpg' with the path to your image */
  background-size: ; /* Cover the entire background */
  background-position: ; /* Center the background image */
  background-repeat: no-repeat; /* Do not repeat the background image */    
     

}
        .login-container {

            background-color: #fff;
            padding: 50px;
            margin: 100px;
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
    
.required-span{
    color:red;
}
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}
img.avatar {
  width: 50%;
  border-radius: 70%;
}

html, body {
  height: 100%;
  width: 100%;
}
body {
  display: table;
  margin: 0;
}
#top, #bottom {
  width: 100%;
  background: yellow;
  display: table-row;
}
#top {
  height: 50px;
}
#bottom {
  background: lightgrey;
  height: 100%;
}

</style>
<body>
<center>


    
        <form class="login-container" >
      
      <img src="icon.png" alt="Avatar" class="avatar">
    </div>
        <h2>Login</h2>

        <form action="" method="get" class="login-form">

             <div class="form-group">

                <label for="password">email:<span class="required-span"> *</span></label>
                <input type="text" id="password" name="email" placeholder="Enter id" required>

            </div>
            <div class="form-group">

                <label for="password">Password:<span class="required-span"> *</span></label>
                <input type="password" id="password" name="password" placeholder="Enert password" required>

            </div>

            <div class="form-group">
             <button type="submit" name="submit">Login</button>
               <a href="index.html"> <button type="submit"name="submit"=>back</button></a>
               
            </div>


                    For<a href="indext003.php"> registration</a>
        </form>
    </div>

        

        </center>
        
   </body>
   
</html>
