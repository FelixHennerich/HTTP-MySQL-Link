<html>
<body>

<?php

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

/*
    Get current auth code.
*/
$sql = "SELECT authcode FROM auth WHERE available = true";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Authcode: " . $row["authcode"]."<br><br>";
    }
} else {
    echo "0 results";
}

echo "Get Success!<br>";

/*
    Create new auth code after every usage
*/

?>
</body>
</html>