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
$column = $_POST['column'];
$value = $_POST['value'];
$where = $_POST['where'];
$unit = $_POST['unit'];

/*
$table = "newsapplication";
$column = "b";
$value = 15;
$where = "test";
$unit = 1;
*/



mysqli_query($connect,"UPDATE $table SET $column = $value WHERE $where = $unit");

echo "Insertion Success!<br>";

?>
</body>
</html>