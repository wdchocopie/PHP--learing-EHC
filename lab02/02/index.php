<html>
<body>
<h1>Sum 1 -> n </h1>
<form action="" method="post">
Input n: <input type=text name=n required><br><br>
<input type=submit value="Calculate">
</form>
</body>
<?php
$n = $_POST['n'];
$a = 0;
if (is_numeric($n) && $n > 1){
        for ($x =  0; $x <= $n; $x++)
        {
                $a = $a + $x;
        }
        echo "Result: ". $a;
}
else
{
        echo "Please enter vaild number (n > 1)";
}
?>
</html>
