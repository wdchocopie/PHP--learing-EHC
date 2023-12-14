<html>
<body>
<h1>Factorial </h1>
<form action="" method="get">
Input n: <input type=text name=n><br>
<br><input type=submit value="Calculate">
</form>
</body>
<?php
$n = $_GET['n'];
$a = 1;
for ($x = 1; $x <= $n; $x++)
{
        $a = $a * $x;
}
echo "Result: ". $a;
?>
</html>


