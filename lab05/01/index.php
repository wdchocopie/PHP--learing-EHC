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
            //patten in RegEx
            //check everything at https://www.w3schools.com/php/php_ref_regex.asp
            $patten = "/[^.,\d]/i";

            //change character using preg_replace
            $result = preg_replace($patten, '',$var);
            echo $result;
        }
        else {
            echo 'Please input a string!';
        }

    }
    ?>
    </div>
</html>