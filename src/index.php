<?php
$page = $_SERVER['PHP_SELF'];
$sec = "15";
?>


<html>
<head>
<!--//I've used bootstrap for the tables, so I inport the CSS files for taht as well...-->
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">		
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
	
	
	
	
	
<body>    		
		
		
<?php
include("database_connect.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM newsapplication");

echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Daten NewsApplication</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>CONTROL NUMBER 1</td>
        <td>CONTROL NUMBER 2</td>
        <td>CONTROL NUMBER 3</td>
		<td>CONTROL NUMBER 4 </td>
		<td>CONTROL NUMBER 5 </td>
      </tr>  
		";
		  
while($row = mysqli_fetch_array($result)) {

 	echo "<tr class='success'>";
	 $unit_id = $row['test'];
   	
    $column6 = "a";
    $column7 = "b";
    $column8 = "c";
	
    $current_num_1 = $row['a'];
	$current_num_2 = $row['b'];
	$current_num_3 = $row['c'];
	
		
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_1  size='15' >
  	<input type='hidden' name='unit' style='width: 120px;' value=$unit_id >
  	<input type='hidden' name='column' style='width: 120px;' value=$column6 >
  	<input type= 'submit' name= 'change_but' style='width: 120px; text-align:center;' value='change'></form></td>";
	
        
	
  	echo "<td><form action= update_values.php method= 'post'>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_2  size='15' >
  	<input type='hidden' name='unit' style='width: 120px;' value=$unit_id >
  	<input type='hidden' name='column' style='width: 120px;' value=$column7 >
  	<input type= 'submit' name= 'change_but' style='text-align:center' value='change'></form></td>";
	
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_3  size='15' >
  	<input type='hidden' name='unit' style='width: 120px;' value=$unit_id >
  	<input type='hidden' name='column' style='width: 120px;' value=$column8 >
  	<input type= 'submit' name= 'change_but' style='text-align:center' value='change'></form></td>";

	
	echo "</tr>
	  </tbody>"; 
	
}
echo "</table>
<br>
";		
?>