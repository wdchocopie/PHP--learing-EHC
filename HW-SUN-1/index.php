<!DOCTYPE html>
<!--Login form-->
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>Login Here</h1>
        <form action="" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="submit" value="Login">
        </form>

        <!--PHP code-->
        <?php
            //check if submit button is clicked
            if (isset($_POST['submit'])){
                //get username and password
                $username = $_POST['username'];
                $password = $_POST['password'];

                //accounts array
                $accounts = array(
                    "wdchocopie" => array("role" => "admin", "password" => "12345678"),
                    "tranlong" => array("role" => "user", "password" => "4321")
                );

                //check if username and password is empty
                if (empty($username) || empty($password)){
                    echo "<br>Username or Password is empty";
                } else {
                    //check if username exists and password is correct
                    if (array_key_exists($username, $accounts) && $password == $accounts[$username]['password']){
                        echo "<br>Login successful";
                        //check if user is admin
                        if ($accounts[$username]['role'] == "admin"){
                            echo "<br><h4>Welcome Admin</h4>";
                            echo "User Account:<br>";
                            //display user account
                            foreach ($accounts as $user_username => $details) {
                                if ($details['role'] == "user") {
                                    echo "Username: " . $user_username . "<br>";
                                    echo "Password: " . $details['password'] . "<br><br>";
                                }
                            }
                        } else {
                            echo "<br><h4>Welcome User</h4><br>";
                        }
                    } else {
                        echo "<br>Invalid username or password";
                    }
                }
            }
        ?>
        
    </body>
</html>
