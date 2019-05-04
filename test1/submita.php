<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>

<a href="http://localhost:8080/test/">Back to Home!</a>
<br><br>

<?php
$x=$_POST['artist_name'];
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
//echo "Connected successfully. ". "<br>"."<br>";




$sql = "SELECT * FROM Artists WHERE artist_name REGEXP '$x';";
$result = mysqli_query($conn,$sql) ;
//print $sql. "<br>";
$s = ["spotify"];

$resultSetA = $conn->query("SELECT award_name FROM Artists, Awards WHERE Artists.artist_id = Awards.artist_id AND artist_name='$x';");

$resultSet1 = $conn->query("SELECT DISTINCT song_name FROM Songs WHERE artist_name = '$x';");


if ( false===$result ) {
    printf("error: %s\n", mysqli_error($conn));
}
else {
    //echo 'Query passed'."<br>"."<br>";


}
"<br>". "<br>";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

        echo "Name: " . $row["artist_name"]. "<br>"."<br>";
        //echo "Artist ID: " . $row["artist_id"]. "<br>";
        echo "Artist spotify link: " . $row["spotify"]. "<br>"."<br>";
        echo "Artist birthday: " . $row["birthday"]. "<br>"."<br>";
    }
} else {
    echo "0 results". "<br>";


}

if (mysqli_num_rows($resultSetA)>0) {
    while ($row = mysqli_fetch_assoc($resultSetA)){
        echo "Award: ". $row["award_name"]."<br>"."<br>";
    }
}else {
    echo "No Awards in 2018" . "<br>"."<br>";
}
?>




<form action = "submits.php" method = "post">

    Songs by this artist: <br>

    <select name="song_name">
        <?php

        while ($rows = $resultSet1->fetch_assoc())
        {
            $song_name = $rows['song_name'];
            echo "<option value = $song_name> $song_name</option>";
        }
        ?>
        <br><br>

        <input type="submit" value="Submit">
    </select>


</form>




</html>



