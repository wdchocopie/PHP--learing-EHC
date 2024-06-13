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

                //account array
                //admin account
                $admin = array("carlos" => "12345678");
                //user account
                $user = array("peter" => "4321");

                //check if username and password is empty
                if (empty($username) || empty($password)){
                    echo "<br>Username or Password is empty";
                } else {
                    //check if username and password is valid
                    if (array_key_exists($username, $admin) && $password == $admin[$username]){
                        echo "<br>Login successful";
                        echo "<br><h4>Welcome Admin</h4>";
                        echo "User Account:<br>";
                        //display user account
                        foreach ($user as $user_username => $user_password) {
                            echo "Username: " . $user_username . "<br>";
                            echo "Password: " . $user_password . "<br><br>";
                        }
                    //check if username and password is valid
                    } else if (array_key_exists($username, $user) && $password == $user[$username]){
                        echo "<br>Login successful";
                        echo "<br><h4>Welcome User</h4><br>";
                    } else {
                        echo "<br>Invalid username or password";
                    }
                }
            }
        ?>
        
    </body>
</html>
