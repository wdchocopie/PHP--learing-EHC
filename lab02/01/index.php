<html>
<body>
<form action="" method="get">
Input a: <input type=text name=a><br>
Input b: <input type=text value="" name=b>
<br>ax + b = 0
<br><br><input type=submit value="Calculate">
</form>
</body>
<?php
$a=$_GET["a"];
$b=$_GET["b"];
if (isset($a) && isset($b)){
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
?>
</html>
