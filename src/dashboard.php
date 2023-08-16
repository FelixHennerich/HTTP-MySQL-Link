<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form method="post" action="dashboard.php">
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hier kannst du deine Überprüfungen durchführen, z.B. eine Datenbankabfrage für Benutzerdaten
    
    // Beispielüberprüfung (nur zu Demonstrationszwecken)
    $correctEmail = 'example@example.com';
    $correctPassword = 'securepassword';
    
    
    
}
?>
