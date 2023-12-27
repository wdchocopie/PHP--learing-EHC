<html>
    <div style="margin:auto; text-align:center;">
        <!--form upload-->
        <form action='' method='post' enctype="multipart/form-data">
        <h1>Upload image</h1> <br>
        <input type="file" name='upload' id='upload' required> <br><br>
        <input type='submit' value='Upload image' name='submit'> 
        </form>

        <!--php-->
        <?php
            //allowed file extension
            $allowed = ["jpg", "png", "gif", "jpeg"];
            $uploadok = 1;

            //file name by checking how many file in folder -> change to hash
            $numfile = new FilesystemIterator(__DIR__, FilesystemIterator::SKIP_DOTS);
            $hashname = hash('sha256',iterator_count($numfile));
            //echo $hashname;
            
            //process uploading
            if (isset($_POST['submit'])) {
                if (isset($_FILES['upload'])) {

                    $file = $_FILES['upload']['name'];
                    
                    //checking file if exist
                    //if (file_exists($file)) {
                    //    echo "<script type='text/javascript'>alert('Image name already exist');</script>";
                    //    $uploadok = 0;
                    //  }

                    //get file extension
                    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                    
                    //check file extension
                    if (in_array($file_extension, $allowed)) {
                        //change file name to hash
                        $filepath = "" . $hashname.".".$file_extension;
                        echo "<b>Change file name: ".$file . " --> " .$filepath. "</b>";
                    } else {
                        echo "Invalid file type! Please try again";
                        $uploadok = 0;
                    }
                    
                    
                    //everything ok, start uploading 
                    if ($uploadok == 1){   
                        
                        if (move_uploaded_file($_FILES['upload']['tmp_name'], $filepath)) {
                            echo "<div style='text-align: center;'>";
                            echo "<img src='" . $filepath . "' />";
                            echo "</div>";
                        } else {
                            echo "<script type='text/javascript'>alert('Error uploading file');</script>";
                        }
                    }
                }
            }
        ?>
    </div>

</html>