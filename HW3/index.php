<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>FB88 Nhà cái đến từ châu âu</title>
</head>

<!--Register form-->
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1>Login</h1>
                <form action="login.php" method="post">
                    Username: <input type=text value='' name='username' required> <br>
                    Password: <input type=password value='' name='password' required> <br>
                    <input type="checkbox" value='' name='rme'>
                    <label>Remember me</label> <br>
                    <input type=submit value='login' name='login'>
                </form>
                <?php
                    session_start();
                    if (isset($_SESSION['userlogin'])) {
                        unset($_SESSION['userlogin']);
                    }
                ?>
            </div>
        
            <div class="col-lg-6">
                <h1>Signup for new account</h1>
                <form action="register.php" method="post">
                    Username: <br><input type=text value='' name='username' required> <br>
                    Password: <br><input type=password value='' name='password' required> <br>
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
                    <input type="checkbox" value="" name="terms" required><label>I agree with registeration</label><br><br>
                    <input type=submit value='Register' name='register'>
                    
            </div>
    </body>
</html>
