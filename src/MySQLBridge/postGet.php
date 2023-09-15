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

// SQL-Abfrage erstellen
$sql = "SELECT * FROM posts
        ORDER BY RAND()
        LIMIT 5";

// SQL-Abfrage ausführen
$result = $connect->query($sql);

// Überprüfen, ob Ergebnisse vorhanden sind
if ($result->num_rows > 0) {
    // Ergebnisse ausgeben
    while ($row = $result->fetch_assoc()) {
        echo "#IDDD".$row['id'] ."#TEXT".$row['text']."#UUID".$row['uuid']."#DATE".$row['date']."#<br>";
        // Hier kannst du die gewünschten Spalten anpassen
    }
} else {
    echo "Keine Ergebnisse gefunden.";
}
?>
</body>
</html>