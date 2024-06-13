<?php
//https://www.w3schools.com/php/php_superglobals_server.asp
if(!empty($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    //why use empty https://www.geeksforgeeks.org/difference-between-isset-and-empty-functions/
    if(!empty($_POST['username']) && 
    !empty($_POST['password']) && 
    !empty($_POST['firstName']) && 
    !empty($_POST['lastName']) && 
    !empty($_POST['gender']) && 
    !empty($_POST['dob']) && 
    !empty($_POST['terms'])) {
        
        //get all input
        //trim https://www.w3schools.com/php/func_string_trim.asp
        //trim for remove extra space
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']); 
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        
        //usernname requirement: https://support.google.com/a/answer/9193374?hl=en#:~:text=the%20following%20guidelines.-,Usernames,in%20usernames%20must%20be%20lowercase.
        //https://sharemylesson.com/content/what-valid-username#:~:text=Your%20username%20can%20be%20your,(_)%2C%20and%20the%20%40%20sign.
        if(preg_match('@[^\w\-\.\'\@]@', $username) || 
        !preg_match('@^[a-zA-Z]@', $username)|| 
        strlen($username) < 5){
            echo '<b>Username does not match requirement</b>. <br> <a href="index.html">Please try again</a> ';
            exit();
        }

        //regex set password requirement

        $uppercase = preg_match('@[A-Z]@', $password); //uppercase
        $lowercase = preg_match('@[a-z]@', $password); //lowercase
        $number    = preg_match('@[0-9]@', $password); //numbers
        $specialChars = preg_match('@[^\w_]@', $password); //except [a-zA-Z0-9] -> contain special character


        //password condition
        if(!$uppercase || 
        !$lowercase || 
        !$number || 
        !$specialChars || 
        strlen($password) < 8) {
            echo '<b>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character</b>. <br> <a href="index.html">Please try again</a>';
            exit();
        }

        //Check string if conntain HTML, CSS or PHP code
        if ($username != strip_tags($username)|| 
        $lastName != strip_tags($lastName) || 
        $firstName != strip_tags($firstName)){
            echo '<b>Please do not enter HTML, PHP or CSS string.</b> <br> <a href="index.html">Please try again</a>';
            exit();
        }

        //check first name last name if contain
        if (preg_match('@[0-9]@', $firstName) || 
        preg_match('@[0-9]@', $lastName) || 
        preg_match('@[^\w_ ]@', $lastName) || 
        preg_match('@[^\w_ ]@', $firstName)){
            echo '<b>Please enter valid First / Last name.</b> <br> <a href="index.html">Please try again</a>';
            exit();
        }

        //check if gender value has been changed
        if($gender != "male" && $gender != "female"){
            echo '<b>Please don\'t do HTML Exploit.</b> <br> <a href="index.html">Please try again</a>';
            exit();
        }

        //check if dob input is valid
        if(false === strtotime($dob)){
            echo '<b>Please don\'t do HTML Exploit.</b> <br> <a href="index.html">Please try again</a>';
            exit();
        }
        
        // Create date / time from strings
        $dob = new DateTime($dob);
        $now = new DateTime();
        
        //get year in date format
        $dob_check_year = $dob->format('Y'); 
        $now_check_year = $now->format('Y'); 
        
        //get month
        $dob_check_month = $dob->format('m');
        $now_check_month = $now->format('m');
        
        //get day
        $dob_check_day = $dob->format('d');
        $now_check_day = $now->format('d');

        //check if dob year > now
        if (($dob_check_year > $now_check_year) || 
        ($dob_check_year == $now_check_year && $dob_check_month > $now_check_month) || 
        ($dob_check_year = $now_check_year && $dob_check_month == $now_check_month && $dob_check_day > $now_check_day)) {
            echo '<b>Please Input a valid DOB.</b>  DOB must before (yyyy-mm-dd): ' . $now_check_year. '-' . $dob_check_month . '-'. $dob_check_day. '<br> <a href="index.html">Please try again</a>';
            exit();
        }

        $difference = $now->diff($dob); // get difference between two dates
        $age = $difference->y; // get difference in years



        // Create name array
        $firstname_array = explode(" ", $firstName);
        $lastname_array = explode(" ", $lastName);

        //capitalize 
        foreach($firstname_array as &$a){
            $a = ucfirst($a);
        }

        foreach($lastname_array as &$b){
            $b = ucfirst($b);
        }

        // merge
        $fullname_array = array_merge($firstname_array, $lastname_array);

        // join
        $fullname = implode(" ", $fullname_array);


        //print values
        echo "Username: ".$username."<br>";
        echo "Password in hash: ".md5($password)."<br>"; //md5 hash
        echo "Full Name: ". $fullname ."<br>";
        echo "Gender: ".$gender."<br>";
        echo "Age: ".$age."<br>";
        
    }
    else {
        echo "All fields are required!";
    }
}

?>