<?php

echo("
<FORM method='POST' ACTION='contact.php?m=2'><br>
<table cellpadding=5 cellspacing=0 border=0><tr>
<td valign=top>Recipient :</td>
<td valign=top><input type=text value='fucker@fuck.com' name=frecp size=21></td>
</tr>
<tr>
<td valign=top>your fake sender address :</td>
<td valign=top><input type=text value='bill@microsoft.com' name=fsend size=21></td>
</tr>
<tr>
<td valign=top>Subject : </td>
<td valign=top><input type=text value='$named' name=ftype size=30>
</td>
</tr>
<tr>
<td valign=top>num of message : </td>
<td valign=top><input type=text value='100' name=fmnt size=30>
</td>
</tr>
<tr><td valign=top>Message :</td><td valign=top>
<textarea rows=13 cols=40 wrap='off' name='fmessage'></textarea></td>
</tr><tr><td valign=top></td>
<td valign=top><input type=submit value=Send></form></td></tr></table>");
 


if($m==2){
if($fmnt<100){

for($r=0;$r<$fmnt;$r++){

$fsubject = "$ftype";
$fheaders = "From: $fsend <$fsend>";
$faddress = "$frecp";
$fmsg = "$fmessage\n";

mail($faddress, $fsubject, $fmsg, $fheaders);
echo "Thanks $fname for your mail!<br>";

}
}
else {
print "too many dan";
}

}



?>


	  