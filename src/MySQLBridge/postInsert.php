<html>
<body>

<?php

$dbname = 'TrendWave';
$dbuser = 'trendwave';  
$dbpass = 'ybnykF4ACMnSpU'; 
$dbhost = 'localhost'; 



$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit(13);
}
echo "Connection Success!<br><br>";

$id = $_GET['id'];
$uuid = $_GET['uuid'];
$date = $_GET['date'];
$text = $_GET['text'];
$authCodeByUser = $_GET['authcodetocheck']; //authcode that must be delivered in the post statement





 /**
  * 
  * Verify Authcode
  * 
  */

 $sql = "SELECT authcode FROM auth WHERE available = true";
 $result = $connect->query($sql);

 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $authcode = $row["authcode"];
        if($authCodeByUser == $authcode){ // authcode of user equals the "real" authcode
           $booleanvalue = true;
        }
    }

} else {
    echo "No Authcode found";
    exit(111);
}
if($booleanvalue != true){
   exit(101);
}

 /**
  * 
  * MySQL request
  *
  */

$sql2 = "INSERT INTO posts (id, uuid, date, text)
        VALUES ('$id', '$uuid', '$date', '$text')";
$result = $connect->query($sql2);

exit(100)
?>
</body>
</html>