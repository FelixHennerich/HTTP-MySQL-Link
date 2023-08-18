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



    /**
     * Function for generating a 256Bit Unique ID (UUID)
     *
     * @return string -> 256Bit UUID
     */
    function generate256BitUUID() {
        $randomBits = generateRandomBits(256);
        return formatBitsAsUUID($randomBits);
    }

    /**
     * Generating random bits for UUID
     *
     * @param int $bits -> length of UUID
     * @return array -> Array of randomized Bytes
     */
    function generateRandomBits($bits) {
        $byteArraySize = ceil($bits / 8);
        $randomBytes = [];
        
        for ($i = 0; $i < $byteArraySize; $i++) {
            $randomBytes[] = random_int(0, 255);
        }
        
        // Clear the unused bits in the last byte
        $randomBytes[0] &= 0xFF << (8 - ($bits % 8));

        return $randomBytes;
    }

    /**
     * Formatting the randomized Bytes to UUID
     *
     * @param array $bits -> Bytearray with randomized Bytes
     * @return string -> finished UUID
     */
    function formatBitsAsUUID($bits) {
        $sb = [];
        foreach ($bits as $byte) {
            $hex = str_pad(dechex($byte), 2, '0', STR_PAD_LEFT);
            $sb[] = $hex;
        }
        return implode('', $sb);
    }

    // Call the method and print the result
    $uuid = generate256BitUUID();

    if (strlen($uuid) > 32) {
        $uuid = substr($uuid, 0, 32);
    }


    $sql = "INSERT INTO auth (available, authcode) VALUES (true, \"$uuid\")";
        
    $result = $connect->query($sql);

    echo "authcode:".$uuid;


}
?>
</body>
</html>