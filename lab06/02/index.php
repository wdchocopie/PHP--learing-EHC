<html>
  <div>
    <form name='lab02get' method='post'>
      Student input: <br>
      Name: 
      <input type='text' name='name' value='' required>
      <br>Number:
      <input type='number' name='number' value='' required>
      <br>Email:
      <input type='text' name='email' value='' requried>
      <br>
      <input type='submit' name='submit' value='Submit'>
    </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS myDB";
    if (mysqli_query($conn, $sql)) {
      //echo "debug: Database created successfully(1)";
    }
    //connect DB
    $conn = mysqli_connect($servername, $username, $password, "myDB");
    
    //create table
    $sql = "CREATE TABLE IF NOT EXISTS lab01 (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        mobile VARCHAR(10) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

    

    //sql retrieve database
    $sql = "SELECT id, name, mobile, email, reg_date FROM lab01";
    $result = mysqli_query($conn, $sql);
    echo "<br> Student info <br>";
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        
        echo "Id: " . $row['id']. " - Name: " . $row['name']. "<br>";
      }
    } else {
      echo "0 results";
    } 
    



    if (isset($_POST["submit"])){

      //get input
      $name = $_POST['name'];
      $number = $_POST['number'];
      $email = $_POST['email'];
      //check input if correct format (name - number - email)
      if (is_string($name) && !preg_match('~[0-9]+~', $name) && strlen($number) == 10 && is_numeric($number) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = "INSERT INTO lab01 (name, mobile, email)
        VALUES ('".$name."', '".$number."', '".$email."')";
        mysqli_query($conn, $sql);
        header("Refresh:0");
      }
      else {
        echo "<b>Please input this information with correct format<br>Name: do not contain number<br>Number: has 10 digit<br>Email: has the correct format [example@gmail.com]</b>";
      }
    }
    mysqli_close($conn);
    ?>
  </div>
  
  <!--Show full info-->
  <br><br>
  <div>
    <form name='lab02infofull' method='post'>
      Type id want to check: 
      <input name="id_full_info" type='number' required>
      <input name="submit_full_detail" type='submit' value="Show all information">
    </form>

    <?php
      error_reporting(0);
        $servername = "localhost";
        $username = "root";
        $password = "";
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        //connect DB
        $conn = mysqli_connect($servername, $username, $password, "myDB");
        
        //get info by id
        if(isset($_POST['submit_full_detail']) && is_numeric($_POST['id_full_info'])){
          
          $sql= "SELECT id, name, mobile, email, reg_date FROM lab01 WHERE id='".$_POST['id_full_info']."'";
          $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
          //print_r($result);
          echo "Id: ". $result['id'] ."<br>Name: ".$result['name']. "<br>Number: ". $result['mobile']. "<br>Email: ". $result['email']. "<br>Date create: ". $result['reg_date'];
            
        }
     
     mysqli_close($conn);
    ?>
  </div>
  
  <!--remove info-->
  <br><br>
  <div>
    <form name='lab02inforemove' method='post'>
      Type id want to delete: 
      <input name="id_remove" type='number' required>
      <input name="submit_remove" type='submit' value="Delete">
    </form>

    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        //connect DB
        $conn = mysqli_connect($servername, $username, $password, "myDB");
        
        //get info by id
        if(isset($_POST['submit_remove']) && is_numeric($_POST['id_remove'])){
          
          $sql= "DELETE FROM lab01 WHERE id='".$_POST['id_remove']."'";
          if (mysqli_query($conn, $sql)) {
            header("Refresh:0");
          } else {
            echo "Error deleting record: " . mysqli_error($conn);
          }
        }
     
     mysqli_close($conn);
    ?>
  </div>

  <!--edit info-->
  <div>
  <form name='lab02edit' method='post'>
      Student update: <br>
      ID:
      <input type='number' name='id_edit' value='' required> <br>
      Name: 
      <input type='text' name='name_edit' value='' >
      <br>Number:
      <input type='number' name='number_edit' value='' >
      <br>Email:
      <input type='text' name='email_edit' value='' >
      <br>
      <input type='submit' name='submit_edit' value='Submit'>
    </form>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
  
      // Create connection
      $conn = mysqli_connect($servername, $username, $password);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      //connect DB
      $conn = mysqli_connect($servername, $username, $password, "myDB");
      
      //check submit / id
      if (isset($_POST['submit_edit'])){
        $id = $_POST["id_edit"];
        if(!empty($id)){
          //get input
          $name_edit = $_POST['name_edit'];
          $number_edit = $_POST ['number_edit'];
          $email_edit = $_POST['email_edit'];

          //update value
          if(!empty($name_edit)){
            $sql = "UPDATE lab01 SET name='".$name_edit."' WHERE id=".$id;

            if (mysqli_query($conn, $sql)) {
              echo "Name updated successfully<br>";
            } else {
              echo "Error updating record: " . $conn->error;
            }
            
          }
          if(!empty($number_edit)){
            $sql = "UPDATE lab01 SET mobile='".$number_edit."' WHERE id=".$id;

            if (mysqli_query($conn, $sql)) {
              echo "Number updated successfully<br>";
            } else {
              echo "Error updating record: " . $conn->error;
            }
            
          }
          if(!empty($email_edit)){
            $sql = "UPDATE lab01 SET email='".$email_edit."' WHERE id=".$id;

            if (mysqli_query($conn, $sql)) {
              echo "Email updated successfully";
            } else {
              echo "Error updating record: " . $conn->error;
            }
            
          }
          
        }
        mysqli_close($conn);
        header("Refresh:2");
      }
    ?>
  </div>
</html>