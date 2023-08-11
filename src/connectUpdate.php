<?php
// Verbindung zur MySQL-Datenbank herstellen
$servername = "localhost";
$username = "id20158736_admin";
$password = "WnFnE6Pa9LZ6LF!";
$dbname = "id20158736_weatheresp"; 

// JSON-Daten aus dem POST-Request empfangen
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);
echo $data;
if ($data) {
    // Datenbankverbindung herstellen
	
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Überprüfen, ob die Verbindung erfolgreich war
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // JSON-Daten analysieren und in die MySQL-Anfrage einfügen
    $table = $data['table'];
    $column = $data['column'];
    $value = $data['value'];
    $where = $data['where'];
    $unit = $data['unit'];

    $sql = "UPDATE $table SET $column = '$value' WHERE $where = '$unit'";

    // Anfrage ausführen
    if ($conn->query($sql) === TRUE) {
        echo "Daten erfolgreich aktualisiert.";
    } else {
        echo "Fehler bei der Ausführung der Anfrage: " . $conn->error;
    }

    // Verbindung schließen
    $conn->close();
} else {
    echo "Keine gültigen Daten empfangen.";
}
?>
