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
$x=$_POST['song_name'];
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
//echo "Connected successfully. ". "<br>". "<br>";

$sql = "SELECT DISTINCT song_name, genre, release_date, artist_name, album_name FROM Songs WHERE song_name = '$x';";
$result = mysqli_query($conn,$sql) ;
//print $sql. "<br>";


if ( false===$result ) {
    printf("error: %s\n", mysqli_error($conn));
}
else {
    //echo 'Query passed'."<br>";


}
"<br>". "<br>";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

        echo "Song: " . $row["song_name"]. "<br>"."<br>";
        echo "Genre: " . $row["genre"]. "<br>"."<br>";
        //echo "Artist spotify link: " . $row["spotify"]. "<br>";
        echo "Release Date: " . $row["release_date"]. "<br>"."<br>";
        echo "Artist name: " . $row["artist_name"]. "<br>"."<br>";
        echo "Album name: " . $row["album_name"]. "<br>"."<br>";
        //echo "Peak position: " . $row["peak_position"]. "<br>";
    }
} else {
    echo "0 results". "<br>";
}

//if ($conn->query($sql)=== TRUE){
// echo "Successful Query.";
//} else{
//  echo "Error: " .$sql . $conn->error;
//}

$conn->close();
?>
</html>


