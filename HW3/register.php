<?php
if (!empty($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['username']) && 
        isset($_POST['password']) && 
        isset($_POST['email']) && 
        isset($_POST['fullname']) && 
        isset($_POST['title']) && 
        isset($_POST['companyname']) && 
        isset($_POST['terms'])
    ) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
        $fullname = trim($_POST['fullname']);
        $title = trim($_POST['title']);
        $companyname = trim($_POST['companyname']);

        $userhash = hash('sha256', $username);
        $passwordhash = hash('sha256', $password);

        if (preg_match('@[^\w\-\.\'\@]@', $username) || 
        !preg_match('@^[a-zA-Z]@', $username) || 
        strlen($username) < 5) {
            echo '<b>Username does not match requirement</b>. <br> <a href="index.php">Please try again</a>';
            exit();
        }

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w_]@', $password);

        if (!$uppercase || 
        !$lowercase || 
        !$number || 
        !$specialChars || 
        strlen($password) < 8) {
            echo '<b>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character</b>. <br> <a href="index.php">Please try again</a>';
            exit();
        }

        if ($username != strip_tags($username) || $fullname != strip_tags($fullname)) {
            echo '<b>Please do not enter HTML, PHP or CSS string.</b> <br> <a href="index.php">Please try again</a>';
            exit();
        }

        if (preg_match('@[0-9]@', $fullname) || 
        preg_match('@[^\w_ ]@', $fullname)) {
            echo '<b>Please enter valid Full name.</b> <br> <a href="index.php">Please try again</a>';
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'That\'s not a valid email. <br> <a href="index.php">Please try again</a>';
            exit();
        }

        $database = fopen("data.txt", "a+");
        if (!$database) {
            echo 'Error while opening the database. <a href="index.php">Please try again</a>';
            exit();
        }

        while (!feof($database)) {
            $fget = fgets($database);
            if (strtok($fget, "|") == $userhash) {
                echo 'Error while registering. <a href="index.php">Please try again</a>';
                fclose($database);
                exit();
            }
        }

        fwrite($database, $userhash . "|" . $passwordhash . "\n");
        fclose($database);

        $data = fopen($userhash . ".txt", "w");
        if ($data) {
            fwrite($data, $email . "|");
            fwrite($data, $title . "|");
            fwrite($data, $fullname . "|");
            fwrite($data, $companyname);
            fclose($data);
        } else {
            echo 'Error while creating user file. <a href="index.php">Please try again</a>';
        }

        echo 'Registration successful. <a href="index.php">Go to login</a>';
    } else {
        echo "All fields are required! <a href='index.php'>Please try again</a>";
    }
}
?>
