<?php
    include "login.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="CSS/Homepage.css">
</head>
<body>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo "<h1>News-Application Dashboard!</h1>";

        // Start the table
        echo "<table border='1'>
                <tr>
                    <th>UUID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Username</th>
                    <th>Birthday</th>
                    <th>Signup</th>
                    <th>Role</th>
                </tr>";

        $users = array();

        $sql = "SELECT * FROM newsuser";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $users[] = [$row["uuid"],$row["email"],$row["password"],
                            $row["username"],$row["birthday"],$row["signup"],$row["role"]];
            }

        } else {
            exit(11);
        }

        foreach ($users as $usera) {
            echo "<tr>";
            foreach ($usera as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

    } else {
        echo "<h1>Zugriff verweigert</h1>";
    }
    ?>
</body>
</html>
