<!DOCTYPE html>
<html>
<body>
	<style> #totalSalary {
            /* Adjust the width as needed */
            text-align: center; /* Optional: center the text */
            padding: 10px; /* Optional: add padding for space inside the cell */
            border: 1px solid #000; /* Optional: add a border for visibility */
        }</style>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Calculation</title>
     <script>
        function calculateTotalSalary() {
            // Get all the salary cells in the table
            const salaryCells = document.querySelectorAll("table tr td:nth-child(2)");
            let totalSalary = 0;

            // Loop through all salary cells and sum them up
            salaryCells.forEach(cell => {
                totalSalary += parseFloat(cell.textContent.replace(/[^0-9.-]+/g, ""));
            });

            // Display the total salary
            const totalSalaryElement = document.getElementById("totalSalary");
            totalSalaryElement.textContent = totalSalary.toLocaleString();

            // Change the color of the total salary
            totalSalaryElement.style.color = "green"; 
            totalSalaryElement.style.fontSize = "18px"; 
            totalSalaryElement.style.fontWeight = "bold";
            totalSalaryElement.style.background = "red";

        }

        // Call the function when the page is loaded
        window.onload = calculateTotalSalary;
    </script>

<table border="1">
	<tr>
		<th>name</th>
		<th>salary</th>
	</tr>
	<tr>
		<td>Khalid</td>
		<td>500.000</td>
	</tr>
	<tr>
		<td>Hussain</td>
		<td>500.000</td>
	</tr>
	<tr>
		<td>Amina</td>
		<td>500.000</td>
	</tr>
	<tr>
		<td>Abdulla</td>
		<td>2000.000</td>
	</tr>
	<tr>
		<td>Jassim</td>
		<td>1000.000</td>
	</tr>
	<tr>
		<td id="totalSalary"></td>
		
	</tr>
</table>
  

<?php
echo "HTML<br>PHP<br>SQL<br>";
$name = NULL;

$name = 'Jassim';

//echo $name;
// One dimentional array
/*
$students = [
["name" => "Khalid", "marks" => 85]
];

print_r($students);
// Two Dimentional Array
*/
$employees = [
["name" => "Khalid", "salary" => 500.000],
["name" => "Hussain", "salary" => 500.000],
["name" => "Amina", "salary" => 500.000],
["name" => "Abdulla", "salary" => 2000.000],
["name" => "Jassim", "salary" => 1000.000]
];

// print_r($employees);

$sum = 0;

foreach ($employees as $employee){
$sum += $employee['salary'];
}
echo "Total Salarys : ". $sum;

/*
for ($i = 0 ; $i< count($employees) ; $i++){
	$sum += $employees[$i]['salary'];
}
echo "Total Salarys : ". $sum;
*/
// For Each / Done
// For Loop / Done
// While Loop / Done
// Do While loop / Done

//explain the masge in php 

#echo "My first PHP script!";
//echo 3-1

/*
echo"html<br>";
echo"php <br>";
echo"sql<br>";
*/

/*
# Variables  in php 

1.integer = 13
2.floot   = 13.097
3.straing = text
4.boolean = true or false
5.null    =  a variable 

basic code :

$variable = value 
*/

/*
#while loop
$a=1;
while ($a<9) {
 	echo $a .'<br>';
 	$a++;

 } 
*/


/*
#do while loop
$i = 0;

do {
  $i++;
  if ($i == 3) continue;
  echo $i."<br>";
} while ($i < 6);
*/ 

?> 
<form action="lern.php" method="post">
user name <br>	<input type="text" name="uname">
<br>
password <br>	
<input type="password" name="pass">

<input type="submit" value="send" >
</form>

</body>
</html>
