<?php
// Sitzung starten oder bestehende Sitzung fortsetzen
session_start();

// Überprüfen, ob die URL-Parameter vorhanden sind
if(isset($_GET['email']) && isset($_GET['password'])) {
    $email = $_GET['email'];
    $encrypted = $_GET['password'];
    

    /**
     * MySQL CONNECTION
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
    /**
     * GET REAL PASSWORD & Email
     * 12345534
     */


    $sql = "SELECT password FROM newsuser WHERE email = \"$email\"";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $correctpassword = $row["password"];

            if($correctpassword == $encrypted){
        $_SESSION['loggedin'] = true; // Setze die Sitzungsvariable auf true
    }else {
        echo "password Failed";
    }
    }   

    } else {
echo "No User found";
exit(11);
}
}
?>