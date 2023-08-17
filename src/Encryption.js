/**
 * ENCRYPTION OF PASSWORD
 */
    function encryption($s) {
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
                $encrypted += $arr[$i][$j];
            }
        }
        return $encrypted;
    }
