<?php
$array_check = array('EHC', 'HackYourLimits', 'Training');
$length = array_map('strlen', $array_check );
echo "Output: <br> minLength: " . min($length). "<br> maxLength: ", max($length);
?>
