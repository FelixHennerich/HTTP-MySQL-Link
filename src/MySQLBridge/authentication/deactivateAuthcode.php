<html>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET"){

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

    $uuid = $_GET['authcode'];


    $sql = "UPDATE auth SET available = false WHERE authcode = \"$uuid\"";
        
    $result = $connect->query($sql);

}
?>
</body>
</html>