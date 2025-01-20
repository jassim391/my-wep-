

<?php
// Database connection details
$hostname = "localhost";
$username = "root";
$password = "";
$db = "examp";  // Replace with your database name

// Establish a connection to the database using mysqli
$con = mysqli_connect($hostname, $username, $password, $db);

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());  // Stop execution if connection fails and print error message
}

// Query to fetch data from table1
$query = "SELECT * FROM table1";  // Replace 'table1' with your actual table name

// Execute the query
$result = mysqli_query($con, $query);

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    // Start the table before the loop
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Lastname</th><th>Comment</th></tr>"; // Table headers
    
    // Loop through the results and display each row
    while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";  // Start a new table row
        echo "<td>" . $row["id"] . "</td>";  // Display 'id' in the first column
        echo "<td>" . $row["Frist_name"] . "</td>";  // Display 'Frist_name' in the second column
        echo "<td>" . $row["last_name"] . "</td>";  // Display 'last_name' in the third column
        echo "<td>" . $row["comment"] . "</td>";  // Display 'comment' in the fourth column
 echo "</tr>";  // End the current table row
    }
    
    echo "</table>";  // Close the table after the loop
} else {
    echo "No results found.";  // In case no rows are found
}

// Close the database connection
mysqli_close($con);




        /*
        echo "<br>ID: " . $row["id"] . "<br> Name: " . $row["Frist_name"] . " <br>Lastname: " . $row["last_name"] . " <br>cooment: " . $row["comment"] ."<br>"; // Added missing semicolon
        */

/*
// Get username and password from form submission (ensure the form uses POST method)
$username = $_POST['uname'];
$password = $_POST['pass'];

// Display the username and password (Make sure to sanitize inputs in a real app!)
echo "Your name is: <br>" . $username . "<br>This is your password: <br>" . $password;

*/
?>
