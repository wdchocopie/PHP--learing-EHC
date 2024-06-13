<!DOCTYPE html>
<html>
    <body>
        <form action="hw02.php" method="post">
            <input type="number" name="input" placeholder="Input a number">
            <input type="submit" value="Submit" name="submit">
        </form>
        <?php
        if (isset($_POST['submit']) && isset($_POST['input'])){
            $input = $_POST['input'];
            if ($input > 0  && $input < 10 && ctype_digit($input)){
                for ($i = 0; $i <= $input; $i++){
                    for ($j = 1; $j < $i; $j++){
                        echo "$j";
                    }
                    if ($j == $i){
                        for($k = $j; $k >=1; $k--){
                            echo "$k";
                        }
                    }

                    echo "<br>";
                }
            }
            else{
                echo "<br>Invalid input";
            }
        }
        ?>
    </body>
</html>
