<?php
/**
 * 
 * MySQL connection
 * 
 */
$servername = "localhost";
$username = "id20158736_admin";
$password = "WnFnE6Pa9LZ6LF!";
$dbname = "id20158736_weatheresp"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}



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
    $column = $data['column'];
    $value = $data['value'];
    $where = $data['where'];
    $unit = $data['unit'];
    $authCodeByUser = $data['authcode']; //authcode that must be delivered in the post statement




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
			if($authCodeByUser != $authcode){ // authcode of user equals the "real" authcode
				echo "Authentication failed";
				exit();
			}
		}

	} else {
		echo "No Authcode found";
		exit();
	}



    /**
     * 
     * Start MySQL request
     * 
     */

    $sql = "UPDATE $table SET $column = '$value' WHERE $where = '$unit'";

    if ($conn->query($sql) === TRUE) {
        echo "Daten erfolgreich aktualisiert.";
    } else {
        echo "Fehler bei der Ausführung der Anfrage: " . $conn->error;
    }
    $conn->close();

} else {
    echo "Keine gültigen Daten empfangen.";
}
?>
