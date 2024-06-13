<!DOCTYPE html>
<html>
    <body>
        <form action="hw01.php" method="post">
            <input type="number" name="input" placeholder="Input a number">
            <input type="submit" value="Submit" name="submit">
        </form>

        <?php
        // https://stackoverflow.com/questions/462427/is-numeric-intval-ctype-digit-can-you-rely-on-them#:~:text=is_numeric%20will%20tell%20you%20if,floating%20point%20or%20integer%20value).&text=ctype_digit%20will%20tell%20you%20if,check%20as%20you%20isNum%20function).
            if (isset($_POST['submit']) && isset($_POST['input'])){
                $input = $_POST['input'];
                if ($input > 0  && $input < 10 && ctype_digit($input)){
                    for ($i = 0; $i <= $_POST['input']; $i++){
                        for ($j = 1; $j <= $i; $j++){
                            echo "$i";
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
