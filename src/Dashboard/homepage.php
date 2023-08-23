<?php
    include "login.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo "<h1>News-Application Dashboard!</h1>";

        $buttonText = "Log out";
        echo "<form method='post' action=''>";
        echo "<input type='submit' name='submit' value='$buttonText'>";
        echo "</form>";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            echo "Der Knopf wurde angeklickt!";
            session_start();
            session_unset();
            header("Location: ".$_SERVER['PHP_SELF']);
        }

    } else {
        echo "<h1>Zugriff verweigert</h1>";
    }
    ?>
</body>
</html>
