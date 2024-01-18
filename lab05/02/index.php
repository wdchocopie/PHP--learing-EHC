<html>
    <div>
        <!--form-->
        <form name="DateFilter" method="POST">
        Input birthdate: 
        <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <input type="submit" name="submit" value="Submit">
</form>

    <!--php-->
    <?php

    //set timezone - if not, result will shown diffent timezone
    date_default_timezone_set("Asia/Bangkok");
    //check submit button
    if (isset($_POST["submit"])){
        //get input
        $input = $_POST['date'];

        //check if it's correct date format
        //https://tecadmin.net/validate-date-string-in-php/#:~:text=Using%20strtotime()%20Function,date%2C%20the%20function%20returns%20false.

            //get timestamp
            $birthday_timestamp = strtotime($input);
            //echo $birthday_timestamp. "<br>";

            //change it to this year timestamp
            $birthday_this_year_timestamp = mktime(0, 0, 0, date('m',$birthday_timestamp), date('d', $birthday_timestamp), date('Y'));
            //echo $birthday_this_year_timestamp."<br>";

            //get time now in year-month-day
            $time_now = strtotime(date('Y-m-d'));
            //echo $time_now;
            
            //check if date already pass
            if($birthday_this_year_timestamp > $time_now){
                $countdown = ($birthday_this_year_timestamp - $time_now) /86400;
                echo $countdown. " days left";
            }
            elseif ($birthday_this_year_timestamp == $time_now){
                echo "This is your Birthday";
            }
            else {
                $countdown = (strtotime("+1 year", $birthday_this_year_timestamp) - $time_now) / 86400;
                echo $countdown. " days left";
            }

    }
    ?>
    </div>
</html>