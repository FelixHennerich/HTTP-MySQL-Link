<html>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET"){

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

    $uuid = $_GET['authcode'];


    $sql = "UPDATE auth SET available = false WHERE authcode = \"$uuid\"";
        
    $result = $connect->query($sql);

}
?>
</body>
</html>