<html>
<body>
<h1>Factorial </h1>
<form action="" method="post">
Input n: <input type=text name='n' required><br>
<br><input type=submit value="Calculate">
</form>
</body>
<?php
error_reporting(0);
$n = $_POST['n'];
$a = 1;
if (is_numeric($n)){
for ($x = 1; $x <= $n; $x++)
{
        $a = $a * $x;
}
echo "Result: ". $a;
}
else
{
        echo "Please enter a number";
}
?>
</html>


