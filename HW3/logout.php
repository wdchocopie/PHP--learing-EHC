<?php
    session_start();
    if (isset($_SESSION['userlogin'])) {
        session_destroy();
        echo "Successfully logged out. <a href='index.php'>Click here to go back to main page</a>";
    } else {
        echo "You are not logged in. <a href='index.php'>Click here to go back to main page</a>";
    }
?>