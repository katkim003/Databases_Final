<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dbfinal";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error)   {
    die("Connection failed: " . $conn->connect_error);
}
echo "Database Connected successfully. ". "<br>"."<br>";

$resultSet = $conn->query("SELECT artist_name FROM Artists");
$resultSet1 = $conn->query("SELECT DISTINCT song_name FROM Songs");
$resultSet2 = $conn->query("SELECT DISTINCT month FROM Songs ORDER BY month ASC")

?>

<h1 style="color: #000000;"><span style="color: #000000;"><strong>TOP 100 (2018)</strong></span></h1>

<p>This database contains information on all artist who charted in 2018! Select an artist to
see some information about them, as well as see which songs of theirs charted! Or, select a song
from the full list!</p>

<br>
<form action = "submita.php" method = "post">
    Select an Artist: <br>

    <select name="artist_name">
        <?php
        while ($rows = $resultSet->fetch_assoc())
        {
            $artist_name = $rows['artist_name'];
            echo "<option value = $artist_name> $artist_name</option>";
        }
        ?>
        <br><br>


        <input type="submit" value="Submit">
    </select>
    <br>
<br><br>
</form>
<form action = "submits.php" method = "post">

    Or Select Directly From Song List: <br>

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

<br><br>

<form action = "submitm.php" method = "post">

    Or Select a month's Top 100! : <br>

    <select name="month">
        <?php

        while ($rows = $resultSet2->fetch_assoc())
        {
            $month = $rows['month'];
            echo "<option value = $month> $month</option>";
        }
        ?>
        <br><br>

        <input type="submit" value="Submit">
    </select>



</form>
<br><br>

<form action = "comment.php" method = "post">
    Please leave some feedback! <br>

<input type="text" name="comment_text" value="" />
<input type="submit" value="Comment">

</form>

<br><br>

<?php
$sqlc = "SELECT comment_text FROM Comment";
$resultc = mysqli_query($conn,$sqlc) ;


echo '<table border="1" cellspacing="2" cellpadding="2">
    <tr>
        <td> <font face="Arial">Previous Comments</font> </td>
        
    </tr>';

    if ($resultc =$conn->query($sqlc)){
    while ($row = $resultc->fetch_assoc()){
    $comment_text = $row["comment_text"];
        echo '<tr> 
                  <td>'.$comment_text.'</td>
                   
              </tr>';
    }
        $resultc->free();
    }

    ?>



</html>

