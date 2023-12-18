<html>
<body>
<form action="" method="post">
Input a: <input type=text name=a value="" required><br>
Input b: <input type=text value="" name=b required>
<br><br><input type=submit value="Calculate">
</form>
</body>
<?php
error_reporting(0);
$a=$_POST["a"];
$b=$_POST["b"];
if (is_numeric($a) && is_numeric($b)){
echo "Addition: " .$a + $b. "<br>";
echo "Subtraction: " .$a - $b."<br>";
echo "Multiplication: ". $a * $b."<br>";
if ($b == 0){
echo "Can't divide by 0";
}
else {
echo "Division" .$a / $b."<br>";
}
}
else{
echo "Please enter a number";
}
?>
</html>

