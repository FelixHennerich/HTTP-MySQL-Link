<html>
<body>

<?php




/**
 * 
 * Create Database connection
 * 
 */

$dbname = 'id20158736_weatheresp';
$dbuser = 'id20158736_admin';  
$dbpass = 'WnFnE6Pa9LZ6LF!'; 
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
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);
echo $data;
if ($data) {

    $table = $data['table'];
    $uuid = $data['uuid'];
	$email = $data['email'];
	$username = $data['username'];
	$password = $data['password'];
	$signup = $data['signup'];
	$birthday = $data['birthday'];
	$role = $data['role'];
	$authCodeByUser = $data['authcodetocheck']; //authcode that must be delivered in the post statement





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
	 * Insert code to database
	 * 
	 */

	$sql = "INSERT INTO $table(uuid, email, password, username, birthday, signup, role, follower, following) VALUES (\"$uuid\",\"$email\",\"$password\",\"$username\",\"$birthday\",\"$signup\",\"$role\",0,0)";
	$result = $connect->query($sql);

	echo "Insertion Success!<br>";

} else {
    echo "Keine gültigen Daten empfangen.";
}

?>
</body>
</html>