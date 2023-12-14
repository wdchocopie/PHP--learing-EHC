<html>
<body>
<h1>Sum 1 -> n </h1>
<form action="" method="get">
Input n: <input type=text name=n><br><br>
<input type=submit value="Calculate">
</form>
</body>
<?php
$n = $_GET['n'];
$a = 0;
for ($x =  0; $x <= $n; $x++)
{
        $a = $a + $x;
}
echo "Result: ". $a;
?>
</html>
