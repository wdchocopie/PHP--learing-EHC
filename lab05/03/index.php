<html>
    <div>
        <!--form-->
        <form name="HTML converter" method="POST">
        Input html: 
        <input type="text" name="html" value="" />
        <input type="submit" name="submit" value="Submit">
</form>

    <!--php-->
    <?php
        if(isset($_POST['submit'])){
            $input = $_POST['html'];
            // $input_test = "
            // <ul>
            // <li>Coffee</li>
            // <li>Tea</li>
            // <li>Milk</li>
            // </ul>";
            $patten_remove_html = "/<([^>]+)>/s";
            echo preg_replace($patten_remove_html, "",$input);
        }
    
    ?>
    </div>
</html>