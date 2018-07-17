<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>



<?php
	
$servername = 'localhost';
$username = '***';
$password = ***';
$dbname = '***';

$q = ($_GET['q']);
//echo $q;
echo '<br />';
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//echo "SELECT * FROM `glove` WHERE w1='".$q."'";
//echo '<br />';
$sql = "SELECT * FROM `glove` WHERE w1='".$q."'";
$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo $row['w2'] . "<br />";
    echo $row['w3'] . "<br />";
    echo $row['w4'] . "<br />";
    echo $row['w5'] . "<br />";
//    echo "<td>" . $row['w2'] . "</td>";
//    echo "<td>" . $row['w3'] . "</td>";
//    echo "<td>" . $row['w4'] . "</td>";
//    echo "<td>" . $row['w5'] . "</td>";
//    echo "</tr>";
		
//        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
	
//
//$con = mysqli_connect('localhost','ayazhan_glove','glove','ayazhan_glove');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}
//
//mysqli_select_db($con,"ajax_demo");
//$sql="SELECT 'w1', 'w2', 'w3', 'w4', 'w5' FROM 'glove' WHERE w1='".$q."'";
//$result = mysqli_query($con,$sql);
//
//echo "<table>
//<tr>
//<th>Firstname</th>
//<th>Lastname</th>
//<th>Age</th>
//<th>Hometown</th>
//<th>Job</th>
//</tr>";
//while($row = mysqli_fetch_array($result)) {
//    echo "<tr>";
//    echo "<td>" . $row['w1'] . "</td>";
//    echo "<td>" . $row['w2'] . "</td>";
//    echo "<td>" . $row['w3'] . "</td>";
//    echo "<td>" . $row['w4'] . "</td>";
//    echo "<td>" . $row['w5'] . "</td>";
//    echo "</tr>";
//}
//echo "</table>";
//mysqli_close($con);
?>
</body>
</html>