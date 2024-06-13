<!DOCTYPE html>
<html>
    <body>
        <form action="hw03.php" method="post">
            <input type="text" name="input" placeholder="Input">
            <input type="submit" value="Submit" name="submit"><br>
        </form>
        <?php
            if(isset($_POST['submit']) && isset($_POST['input'])){
                $str = str_split($_POST['input']); 
                $number = preg_grep('/[0-9]/', $str);
                $char = array_diff($str, $number);

                // print_r($number);
                // echo "<br>";
                // print_r($char);
                // echo "<br>";
                sort($number);
                if (!empty($number)){
                    foreach($number as $value){
                        if($value % 2 == 0){
                            $new_number[] = $value;
                        }
                    }
                    
                    foreach($number as $value){
                        if($value % 2 != 0){
                            $new_number[] = $value;
                        }
                    }
                }
                //print_r($new_number);

                if(!empty($char)){
                    foreach($char as $value){
                        $new_ascii_value[] = ord($value);
                    }
                    asort($new_ascii_value);
                    foreach($new_ascii_value as $value){
                        $new_char[] = chr($value);
                    }
            
                }
                if (!empty($new_number) && !empty($new_char)){
                    $new_str = array_merge($new_number, $new_char);
                }
                else if (!empty($new_number)){
                    $new_str = $new_number;
                }
                else if (!empty($new_char)){
                    $new_str = $new_char;
                }
                else{
                    echo "Invalid input";
                }
                print_r(implode($new_str));
                

            }
        ?>
    </body>
</html>