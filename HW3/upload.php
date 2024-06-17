<html>
    <div style="margin:auto; text-align:center;">
        <!--form upload-->
        <form action='' method='post' enctype="multipart/form-data">
            <h1>Upload image</h1> <br>
            <input type="file" name='upload' id='upload' required> <br><br>
            <input type='submit' value='Upload image' name='submit'> 
        </form>

        <a href='logout.php'>Logout</a>
        <!--php-->
        <?php
            session_start();
            if($_SESSION['userlogin'] == null){
                header("Location: index.php");
            }
            else{
                //allowed file extension
                $allowed = ["jpg", "png", "gif", "jpeg"];
                $upcheck = 1;

                //file name by checking how many file in folder -> change to hash 
                $numfile = new FilesystemIterator(__DIR__."/img/", FilesystemIterator::SKIP_DOTS);
                $hashname = hash('sha256',iterator_count($numfile));
                //echo $hashname;
                
                //process uploading
                if (isset($_POST['submit'])) {
                    if (isset($_FILES['upload'])) {

                        $file = $_FILES['upload']['name'];
                        
                        //get file extension
                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                        
                        //check file extension
                        if (in_array($file_extension, $allowed)) {
                            //change file name to hash
                            $filepath = "" . $hashname.".".$file_extension;
                            echo "<b>Change file name: ".$file . " --> " .$filepath. "</b>";
                        } else {
                            echo "Invalid file type! Please try again";
                            $upcheck = 0;
                        }
                        
                        
                        //everything ok, start uploading 
                        if ($upcheck == 1){   
                            
                            if (move_uploaded_file($_FILES['upload']['tmp_name'], "img/".$filepath)) {
                                echo "<div style='text-align: center;'>";
                                echo "<img src='img/" . $filepath . "' />";
                                echo "</div>";
                            } else {
                                echo "<script type='text/javascript'>alert('Error uploading file');</script>";
                            }
                        }
                    }
                }
            }
        ?>
    </div>

</html>