<html>
    <div>
        <!--form-->
        <form action="" method="post">
            <h1>Get number</h1>
            <br><br><label>Input a string</label>
            <input type="text" name="var" value="" required>
            <input type="submit" name="submit" value="Submit">
        </form>

    <!--php-->
    <?php
    //check submit button
    if (isset($_POST["submit"])){
        //value check
        $var = $_POST["var"];
        if (!empty($var)) {
            //change it to array
            $array = str_split($var);
            //count array item
            $array_count = count($array) - 1;     
            //constant check array value
            for ($x = 0; $x <= $array_count; $x++){
                //check if array value != "," && "." && is a number
                if (! is_numeric($array[$x]) && $array[$x] != "." && $array[$x] != ","){
                    //remove others from array
                    unset($array[$x]);
                }
            }
            //change array to string -> print
            echo implode($array);
        }
        else {
            echo 'Please input a string!';
        }

    }
    ?>
    </div>
</html>