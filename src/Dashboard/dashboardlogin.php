<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form method="post" action="dashboardlogin.php">
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    $email = $_POST['email'];

    $s = $_POST['password'];
    $l = strlen($s);
    $b = ceil(sqrt($l));
    $a = floor(sqrt($l));
    $encrypted = "";

    if ($b * $a < $l) {
        if (min($b, $a) === $b) {
            $b += 1;
        } else {
            $a += 1;
        }
    }

    // Matrix to generate the Encrypted String
    $arr = array();
    for ($i = 0; $i < $a; $i++) {
        $arr[$i] = array_fill(0, $b, ' ');
    }
    $k = 0;

    // Fill the matrix row-wise
    for ($j = 0; $j < $a; $j++) {
        for ($i = 0; $i < $b; $i++) {
            if ($k < $l) {
                $arr[$j][$i] = $s[$k];
            }
            $k++;
        }
    }

    // Loop to generate encrypted String
    for ($j = 0; $j < $b; $j++) {
        for ($i = 0; $i < $a; $i++) {
            $encrypted .= $arr[$i][$j];
        }
    }

    /**
     * MySQL CONNECTION
     * 
     */
    $dbname = 'TrendWave';
$dbuser = 'trendwave';  
$dbpass = 'ybnykF4ACMnSpU'; 
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
                $redirectUrl = "homepage.php?email=" . urlencode($email) . "&password=" . urlencode($encrypted);

                echo '<script>';
                echo 'var redirectUrl = "' . $redirectUrl . '";';
                echo 'window.location.href = redirectUrl;';
                echo '</script>';
            }else {
                echo "password Failed";
            }
        }
   
    } else {
        echo "No Authcode found";
        exit(11);
    }
    
    
}

?>
