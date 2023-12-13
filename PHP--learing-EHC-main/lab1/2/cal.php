<html>
<body>
<form action="" method="get">
Input a: <input type=text name=a><br>
Input b: <input type=text value="" name=b>
<br><br><input type=submit value="Calculate">
</form>
</body>
<?php
$a=$_GET["a"];
$b=$_GET["b"];
echo "Addition" .$a + $b. "<br>";
echo "Subtraction" .$a - $b."<br>";
echo "Multiplication". $a * $b."<br>";
echo "Division" .$a / $b."<br>";
?>
</html>
