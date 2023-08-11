<?php
$requestBody = file_get_contents('php://input');

$data = json_decode($requestBody, true);

if ($data !== null) {
    $key = $data['key'];
    $name = $data['name'];
    $age = $data['age'];

    echo "Key: $key<br>";
    echo "Name: $name<br>";
    echo "Age: $age<br>";
} else {
    echo "Fehler beim Parsen der JSON-Daten.";
}
?>
