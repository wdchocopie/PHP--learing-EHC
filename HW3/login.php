<?php

session_start();
if (isset($_POST["login"])) {
    // Get data from form
    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);

    // Hash code for existing user
    $userhash = hash("sha256", $user);

    // Append password with hash
    $userpass = $userhash . "|" . hash("sha256", $pass);

    // Open database
    $database = fopen("data.txt", "r");
    if (!$database) {
        echo "Error opening the database.";
        exit();
    }

    // Variable to check if username/password is correct
    $checkvalid = false;

    // Check if EOF
    while (($fget = fgets($database)) !== false) {
        // Check if lines contain userpass
        if (strpos($fget, $userpass) !== false) {
            // Check privilege
            if (strpos(str_replace($userpass, "", $fget), "*") !== false) {
                echo "Successfully logged in as administrator";
                $checkvalid = true;
                break;
            } else {
                // Show information of account
                $checkvalid = true;
                $data = fopen($userhash . ".txt", "r");
                if ($data) {
                    $dataprocess = fgets($data);
                    $info = explode("|", $dataprocess);
                    fclose($data);
                    echo "Welcome back " . $info[1] . " " . $info[2] . "<br>";
                    echo "Email: " . $info[0] . "<br>";
                    echo "Title: " . $info[1] . "<br>";
                    echo "Full Name: " . $info[2] . "<br>";
                    echo "Company Name: " . $info[3] . "<br><br>";

                    // Handle cookie
                    if(isset($_POST["rme"])){
                        if (!isset($_COOKIE["info"]) && $_COOKIE["info"] != $userpass . "|" . $dataprocess) {
                            setcookie("info", $userpass . "|" . $dataprocess, time() + (86400 * 30), "/"); // 30 days
                            echo "Cookie set successfully.";
                            echo "Cookie: " . $_COOKIE["info"];
                        } else {
                            echo "Cookie: " . $_COOKIE["info"];
                        }
                    }
                    $_SESSION['userlogin'] = $userpass;
                    echo "<br><a href='upload.php'>Click here to upload image</a>";
                    echo "<br><a href='logout.php'>Logout</a>";
                    
                    
                    
                } else {
                    echo "Error opening user data file. <a href='index.html'>Please try again</a>";
                    exit();
                }
                break;
            }
        }
    }



    // Close database file
    fclose($database);

    // Check if password is correct or not
    if (!$checkvalid) {
        echo "Username / Password is incorrect. <br> <a href='index.html'>Please try again</a>";
        exit();
    }
}
?>
