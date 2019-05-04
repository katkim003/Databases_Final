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
$x=$_POST['month'];
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

//$resultSet3 = $conn->query("SELECT DISTINCT song_name FROM Songs WHERE artist_name = '$x';");



$sql = "SELECT * FROM Songs WHERE month = '$x' ORDER BY month_position ASC";
$result = mysqli_query($conn,$sql) ;
//print $sql. "<br>";
$s = ["spotify"];



if ( false===$result ) {
    printf("error: %s\n", mysqli_error($conn));
}
else {
    echo 'Query passed'."<br>"."<br>";


}
"<br>". "<br>";

echo '<table border="1" cellspacing="2" cellpadding="2">
<tr>
          <td> <font face="Arial">Month Position</font> </td>
          <td> <font face="Arial">Song Name</font> </td>
          <td> <font face="Arial">Song ID</font> </td>
          <td> <font face="Arial">Genre</font> </td>
          <td> <font face="Arial">Release Date</font> </td>
          <td> <font face="Arial">Artist ID</font> </td>
          <td> <font face="Arial">Month</font> </td>
          <td> <font face="Arial">Artist Name</font> </td>
          <td> <font face="Arial">Album Name</font> </td>
          <td> <font face="Arial">Peak Position</font> </td>
      </tr>';


if ($result =$conn->query($sql)){
    while ($row = $result->fetch_assoc()){
        $month_position = $row["month_position"];
        $song_name = $row["song_name"];
        $song_id = $row["song_id"];
        $genre = $row["genre"];
        $release_date = $row["release_date"];
        $artist_id = $row["artist_id"];
        $month = $row["month"];
        $artist_name = $row["artist_name"];
        $album_name = $row["album_name"];
        $peak_position = $row["peak_position"];

    echo '<tr> 
                  <td>'.$month_position.'</td>
                  <td>'.$song_name.'</td> 
                  <td>'.$song_id.'</td> 
                  <td>'.$genre.'</td> 
                  <td>'.$release_date.'</td> 
                  <td>'.$artist_id.'</td> 
                  <td>'.$month.'</td> 
                  <td>'.$artist_name.'</td> 
                  <td>'.$album_name.'</td> 
                  <td>'.$peak_position.'</td> 
              </tr>';
    }
    $result->free();
}


//song_name, song_id, genre, release_date, artist_id, month, artist_name, album_name, peak_position

?>


</html>



