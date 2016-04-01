<!DOCTYPE html>
<html>
<body>
<?php

if($_POST["username"]=="cosmo" and $_POST["password"]=="lmao"){

$servername = "localhost";
$password = "YOUR_PASSWORD";
$username = "YOUR_USERNAME";
$dbname = "YOUR_DBNAME";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

if($_POST["sub"]){mysqli_query($conn, "TRUNCATE TABLE YOUR_TABLE_NAME");
}

$sql = "SELECT * FROM YOUR_TABLE_NAME";

$result = mysqli_query($conn,$sql)or die(mysqli_error());

echo "<table>";
echo "<tr><th>ID</th><th>ip</th><th>Location</th><th>Day</th><th>Time</th><th>URL</th><th>Info</th></tr>";

while($row = mysqli_fetch_array($result)) {
    $id = $row['ID'];
    $ip = $row['ip'];
    $location = $row['location'];
    $day = $row['day'];
    $time = $row['time'];
    $url = $row['url'];
    $info = $row['info'];
    echo "<tr><td style='width: 50px;'>".$id."</td><td style='width: 150px;'>".$ip."</td><td style='width: 300px;'>".$location."</td>
	<td style='width: 150px;'>".$day."</td><td style='width: 150px;'>".$time."</td><td style='width: 250px;'>".$url."</td>
		<td style='width: 300px;'>".$info."</td></tr>";
} 

echo "</table>";
mysqli_close($con);

}else{
echo "wrong credentials";
echo "<br><a href='http://atillasaadat.me/views/'>GO BACK</a>";
}
?>


</body>
</html>
