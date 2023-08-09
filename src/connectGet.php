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
$maincolumn = $_POST['maincolumn'];
$mainvalue = $_POST['mainvalue'];
$getcolumn = $_POST['getcolumn'];

/*
$table = "newsapplication";
$column = "test";
$value = "a";
*/

echo mysqli_query($connect,"SELECT $getcolumn FROM $table WHERE $maincolumn = $mainvalue");

echo "Insertion Success!<br>";

?>
</body>
</html>