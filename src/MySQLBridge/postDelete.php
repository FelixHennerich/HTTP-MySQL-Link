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
	exit();
}
echo "Connection Success!<br><br>";

$postid = $_GET['id'];
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
    exit(11);
}
if($booleanvalue != true){
   exit(10);
}

 /**
  * 
  * MySQL request
  *
  */

$sql = "DELETE FROM posts WHERE id = '$postid'";

$result = $connect->query($sql);
?>
</body>
</html>