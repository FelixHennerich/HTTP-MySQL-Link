<html>
<body>

<?php




/**
 * 
 * Create Database connection
 * 
 */

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





/**
 * 
 * JSON Post request data 
 * 
 */

 $table = $_GET['table'];
 $email = $_GET['email'];
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
  * Check if username exists
  * 
  */

 $sql = "SELECT username FROM $table WHERE email = \"$email\"";
 $result = $connect->query($sql);

 if ($result->num_rows > 0) {
     echo "Email is used";
     exit(12);
 } else {
     echo "Email is free";
     exit(13);
 }

?>
</body>
</html>