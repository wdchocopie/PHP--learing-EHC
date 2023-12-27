<html>
<!-- Bootstrap -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-6">
        <h1>Login</h1>
        <form action="" method="post">
            Username: <input type=text value='' name='username' required> <br>
            Password: <input type=password value='' name='password' required> <br>
            <input type="checkbox" value='' name='rme'>
            <label>Remember me</label> <br>
            <input type=submit value='login' name='login'>
        </form>

        <?php
        //error_reporting(0);
        //check if click on submit button
        //login code
        if (isset($_POST["login"])) {
            
            //get data from form
            $user = $_POST['username'];
            $pass = $_POST['password'];

            //hash code for existing user
            $userhash = hash('sha256', $user);

            //append password
            $userpass = $user . "|". $pass;

            //open database
            $database = fopen("data.txt", "r");

            //var check if username / password correct
            $checkvalid = 0;
            //echo $userpass;

            //var check if cookie is set
            $setcookie = 0;

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
                        //show information of account
                        $checkvalid = 0;
                        $data = fopen($userhash.".txt", "r");
                        $dataprocess = fgets($data);
                        $info = explode("|",$dataprocess);
                        echo "Welcome back ". $info[1]." ".$info[2]. "<br>";
                        echo "Email: ". $info[0]. "<br>";
                        
                        echo "Title: ". $info[1]. "<br>";   
                        
                        echo "Full Name: ". $info[2]. "<br>";
                        
                        echo "Company Name: ". $info[3];
                        //showcookie
                        echo "<br><br><label>Cookie</label><br>";
                        if (!isset($_COOKIE['info'])){
                            $setcookie == 1;
                        }
                        else {
                        
                            echo $_COOKIE['info'];
                        }
                        break;
                    }
                }
                else 
                {
                    $checkvalid = 1;
                }
            }

            //remember me check
            if (filter_has_var(INPUT_POST,('rme'))){
                //setcookie
                setcookie("info", $userpass."|".$dataprocess);
                if ($setcookie == 1){
                    echo $_COOKIE['info'];
                }
            }


            //close file
            fclose($database);
            //check if password is correct or not
            if ($checkvalid == 1){
                echo "Username / Password is incorrect";
            }
        }
        ?>

    </div>
    <div class="col-lg-6">
        <h1>Signup for new account</h1>
        <form action="" method="post">
            Username: <br><input type=text value='' name='usernameR' required> <br>
            Password: <br><input type=password value='' name='passwordR' required> <br>
            User Email: <br><input type=text value='' name='email' required> <br>
            <label>Select title</label><br>
            <select name=title class="form-group">
                <option value="MR.">Mr.</option>
                <option value="MRS.">Mrs.</option>
            </select>
            <br><label>Full name</label> <input type=text value="" name="fullname" required><br>
            <h2>Company Detail</h2><br>
            Provide information about your company<br><br>
            <label>Company name</label> <br>
            <input type="text" value="" name="companyname"><br>
            <input type="checkbox" value="" required><label>I agree with registeration</label><br><br>
            <input type=submit value='Register' name='register'>
            
            <?php
            //register code
            if (isset($_POST["register"])){
                //get data from form
                //use userhash to store as file name
                $userR = $_POST['usernameR'];
                $userhash = hash('sha256', $userR);
                $passR = $_POST['passwordR'];
                $email = $_POST['email'];
                $title = $_POST["title"];
                $fullname = $_POST["fullname"];
                $cname = $_POST ["companyname"];

                //validate information
                $valid = 0;

                // Validate password strength
                $uppercase = preg_match('@[A-Z]@', $passR);
                $lowercase = preg_match('@[a-z]@', $passR);
                $number    = preg_match('@[0-9]@', $passR);
                $specialChars = preg_match('@[^\w]@', $passR);

                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($passR) < 8) {
                    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character. Please try again';
                }
                else {
                    //validate email string
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $valid = 1;
                      }
                      else {
                        echo "That's not a valid email. Please try again";
                      }
                }
                
                //append user|pass
                $userpassR = $userR . "|". $passR;

                //open data file
                $database = fopen("data.txt", "a+");
                
                if ($valid == 1){
                    //check EOF
                    $checkexist = 0;
                    while(!feof($database)){
                        $fget = fgets($database);

                        //check username is exist
                        if (strtok($fget, "|") == $userR){
                            echo "Error while registering. Please try again";
                            $checkexist = 0;
                            break;
                        }
                        else 
                        {
                            $checkexist = 1;
                        }
                    }

                    //if not exist - store information - register sucessfully 
                    if ($checkexist == 1){
                        //write account information
                        $data = fopen($userhash.".txt", "w");
                        fwrite($data, $email."|");
                        fwrite($data, $title."|");
                        fwrite($data, $fullname."|");
                        fwrite($data, $cname);
                        fclose($data);

                        //write to userdatabase
                        fwrite($database, "\n".$userpassR);
                        echo "Register sucessfully";
                    }
                }
                

                
                //close file
                fclose($database);
            }
            ?>

        </form>
    </div>
</div>
</div>


</html>