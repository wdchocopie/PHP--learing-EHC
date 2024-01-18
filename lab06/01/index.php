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
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
  echo "debug: Database created successfully(1)";
} else {
  //echo "debug: Error creating database: " . mysqli_error($conn);
  $sql = 'DROP DATABASE myDB';
  if(mysqli_query($conn,$sql)){
    $sql = "CREATE DATABASE myDB";
    mysqli_query($conn, $sql);
    echo "debug: Database created successfully(2)";
  }

//connect DB
$conn = mysqli_connect($servername, $username, $password, "myDB");
//create table
$sql = "CREATE TABLE lab01 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    mobile VARCHAR(10) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

//create record
if(mysqli_query($conn, $sql)){
  echo '<br>debug: Create table successfuly';
}
$sql = "INSERT INTO lab01 (name, mobile, email)
VALUES ('Trần Hoàng Long', '09999999999', 'wdchocopie@gmail.com')";
 
if (mysqli_query($conn, $sql)) {
  echo "<br>debug: New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "INSERT INTO lab01 (name, mobile, email)
VALUES ('Cristiano Rolnando', '09999998999', 'cr7@gmail.com')";
 
if (mysqli_query($conn, $sql)) {
  echo "<br>debug: New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "INSERT INTO lab01 (name, mobile, email)
VALUES ('Messi', '09991239999', '7thang10@gmail.com')";
 
if (mysqli_query($conn, $sql)) {
  echo "<br>debug: New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "INSERT INTO lab01 (name, mobile, email)
VALUES ('tuanvm', '0954321999', 'tuanvmso1fpt@gmail.com')";
 
if (mysqli_query($conn, $sql)) {
  echo "<br>debug: New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "INSERT INTO lab01 (name, mobile, email)
VALUES ('Michael fellas', '0123456789', 'michaeltrs6gmail.com')";
 
if (mysqli_query($conn, $sql)) {
  echo "<br>debug: New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//sql retrieve database
$sql = "SELECT id, name, mobile, email, reg_date FROM lab01";
$result = mysqli_query($conn, $sql);
echo "<br> Student info <br>";
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    
    echo "id: " . $row['id']. " - Name: " . $row['name']. " - Molbile: " . $row['mobile']." - email: ". $row["email"] . " - Register date: ". $row["reg_date"]. "<br>";
  }
} else {
  echo "0 results";
} 
 
}

mysqli_close($conn);
?>