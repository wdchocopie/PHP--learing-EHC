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

                $admin_username = "carlos";
                $admin_password = "12345678";

                $user_username = "peter";
                $user_password = "1234";

                //check if username and password is empty
                if (empty($username) || empty($password)){
                    echo "<br>Username or Password is empty";
                }
         
                //check if username and password is valid
                if ($username == $admin_username && $password == $admin_password){
                    echo "<br>Login successful";
                    echo "<br><h4>Welcome Admin</h4>Admin Account: <br> username:$admin_username <br> password:$admin_password";
                    echo "<br> <br>User Account: <br> username:$user_username <br> password:$user_password";

                }
                else if ($username == $user_username && $password == $user_password){
                    echo "<br>Login successful";
                    echo "<br><h4>Welcome User</h4><br>";
                }
                else{
                    echo "<br>Invalid username or password";
                }
        }

        ?>
        
    </body>