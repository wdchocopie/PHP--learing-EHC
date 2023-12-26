<html>
<!--login form--->
<h1>Login</h1>
<form action="" method="post">
    Username: <input type=text value='' name='username' required> <br>
    Password: <input type=password value='' name='password' required> <br>
    <input type=submit value='login' name='login'>
</form>


<?php
    //error_reporting(0);
    
    //check if click on submit button
    if (isset($_POST["login"])) {
        
        //get data from form
        $user = $_POST['username'];
        $pass = $_POST['password'];

        //append password
        $userpass = $user . "|". $pass;

        //open database
        $database = fopen("data.txt", "r");

        //var check if username / password correct
        $checkvalid = 0;
        //echo $userpass;

        //check if EOF
        while(!feof($database)){

            //change line pointer - grep from lines
            $fget = fgets($database);
            //echo $fget. "<br>";

            //check if lines contain pass
            if (str_contains($fget, $userpass) !== false){
                //check priviledge
                if (str_contains(str_replace($userpass,"",$fget), "*")){
                    echo "Successfuly logged in as administrator";
                    $checkvalid = 0;
                    break;
                }
                else 
                {
                    echo "Hello ". $user;
                    $checkvalid = 0;
                    break;
                }
            }
            else 
            {
                $checkvalid = 1;
            }
        }
        //close file
        fclose($database);
        //check if password is correct or not
        if ($checkvalid == 1){
            echo "username / password is incorrect";
        }
    }
?>
</html>