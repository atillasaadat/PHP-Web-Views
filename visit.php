<!DOCTYPE html>
<html>
<body>

<?php
if ($_SERVER['HTTP_CLIENT_IP']!="") 
{
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} 
elseif ($_SERVER['HTTP_X_FORWARDED_FOR']!="") 
{
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else 
{
    $ip = $_SERVER['REMOTE_ADDR'];
}

$servername = "localhost";
$password = "YOUR_PASSWORD";
$username = "YOUR_USERNAME";
$dbname = "YOUR_DBNAME";

$day = date('m/d/Y', time());
$time = date('h:i:s a',time());

$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$location = $details->city . ", " . $details->region . ", " . $details->country;
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

include($_SERVER['DOCUMENT_ROOT'].'/user_info.php');
$info = getOS().", ".getBrowser();

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "INSERT INTO YOUR_TABLE_NAME (ip, location, day, time, url, info)
VALUES ('$ip','$location','$day','$time','$url','$info')";

$ck = "SELECT ip,day FROM YOUR_TABLE_NAME WHERE ip='$ip' AND day='$day' AND url='$url'";
$check = mysqli_query($conn,$ck);
if(mysqli_num_rows($check)>0){
	mysqli_close($conn);
}else{
	mysqli_query($conn, $sql);
	mysqli_close($conn);
}


?>

</body>
</html>