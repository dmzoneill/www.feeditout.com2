<?php 

if($a){
$inputString = "$a"; 
}
else {
$inputString = "teddy bear"; 
}

// convert an input string into it's binary equivalent. 
function asc2bin($inputString, $byteLength=8) 
{ 
    $binaryOutput = ''; 
    $strSize = strlen($inputString); 

    for($x=0; $x<$strSize; $x++) 
    { 
        $charBin = decbin(ord($inputString{$x})); 
        $charBin = str_pad($charBin, $byteLength, '0', STR_PAD_LEFT); 
        $binaryOutput .= $charBin; 
    } 

    return $binaryOutput; 
} 

// convert a binary representation of a string back into it's original form. 
function bin2asc($binaryInput, $byteLength=8) 
{ 
    if (strlen($binaryInput) % $byteLength) 
    { 
        return false; 
    } 
     
    // why run strlen() so many times in a loop? Use of constants = speed increase. 
    $strSize = strlen($binaryInput); 
    $origStr = ''; 

    // jump between bytes. 
    for($x=0; $x<$strSize; $x += $byteLength) 
    { 
        // extract character's binary code 
        $charBinary = substr($binaryInput, $x, $byteLength); 
        $origStr .= chr(bindec($charBinary)); // conversion to ASCII. 
    } 
    return $origStr; 
} 

$binOut = asc2bin($inputString); 
printf("<font color=blue>Input String:</font><br><b>%s</b><br><font color=blue>Binary Version:</font><br><b>%s</b>",$inputString, $binOut); 
print "<br>";
$ascOut = bin2asc($binOut); 
printf("<font color=blue>Input Binary:</font><br><b>%s</b><br><font color=blue>Output ASCII:</font><br><b>%s</b>",$binOut, $ascOut); 
print "<br>";
?> 