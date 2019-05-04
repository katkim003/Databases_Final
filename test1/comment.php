
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>

<?php
$x=$_POST['comment_text'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dbfinal";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)   {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully. ";

$sql = "INSERT INTO Comment (comment_text) VALUES ('$x')";

if ($conn->query($sql)=== TRUE){
    echo "New record created successfully.";
} else{
    echo "Error: " .$sql . $conn->error;
}

$conn->close();


?>

<a href="http://localhost:8080/test/">Back to Home!</a>


</html>
