<html>
<body>
<form action="" method="post">
Input a: <input type=text value="" name=a required><br>
Input b: <input type=text value="" name=b required>
<br>ax + b = 0
<br><br><input type=submit value="Calculate">
</form>
</body>
<?php
error_reporting(0);
$a=$_POST["a"];
$b=$_POST["b"];
if (is_numeric($a) && is_numeric($b)){
if ($a!=0)
{
    $x=-$b/$a ;
    }
else
{
    if ($b==0) {
    $x="unlim";
    }
    else
    {
    $x="non";
    }
}
echo "Answer = ". $x;
}
else
{
    echo "Please Enter number";
}
?>
</html>
