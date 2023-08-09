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

$table = $_POST['table'];
$columnarray = $_POST['columnarray'];
$valuearray = $_POST['valuearray'];

/*
$table = "newsapplication";
$column = "test,a,b,c";
$value = 2,34,5,6;
*/

mysqli_query($connect,"INSERT INTO $table ($columnarray) VALUES ($valuearray)");

echo "Insertion Success!<br>";

?>
</body>
</html>