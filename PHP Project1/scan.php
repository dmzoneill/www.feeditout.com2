<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Port Scanner</title>
<style type="text/css">
<!--
body,td,th {
	font-family: verdana,times,arial;
	font-size: 12px;
	color: #FFFFFF;
}
body {
	background-color: #006699;
}
-->
</style></head>

<body>
<h3>Port Scanner</h3>

<?php

include("connect.php");
include("scanner_class.php");

switch($bitchscan){

default:
$sql = $stream->do_query("update scanupdate set percent='' where id='1'","one");

?><table cellpadding=5>
<form action="scan.php?<?php print md5(time()); ?>" method="post" enctype="multipart/form-data" name="scan">
<tr><td bgcolor='#003333'>Host Range: </td><td>From : <input name="host" type="text" value="<?php print $REMOTE_ADDR; ?>"> To : <input name="hostend" type="text" value="<?php print $REMOTE_ADDR; ?>"><br> - Host to scan</td></tr>
<tr><td bgcolor='#003333'>Port : </td><td><input name="ports" type="text" value="21,80,22,23,81,4662,4672"><br> - Scan these ports<br>eg. 3,4,5,10,567 or 3-10,50-700,4,8</td></tr>
<tr><td bgcolor='#003333'>Wait : </td><td><input name="wait" type="text" value="0"><br> - Delay between ports</td></tr>
<tr><td bgcolor='#003333'>Delay :  </td><td><input name="delay" type="text" value="80"><br> - Echo responce time</td></tr>
<tr><td colspan=2 bgcolor='#003333'><input name="bitchscan" type="submit" value="Scan"></td></tr>
</form></tr></table>
<?php
break;

case "Scan":


$host = $host;
$hostend = $hostend;
$ports = $ports;
$wait = $wait;
$delay = $delay;

print "Scanning $host.....<br>";
print "Scanning ports $ports.....<br>";
print "Delay between ports $wait.....<br>";
print "Responce Timeout $delay ms.....<br>";
flush();

  $my_scanner = new PortScanner($host, $hostend);

  $my_scanner->set_ports($ports);

  $my_scanner->set_wait($wait);


  $my_scanner->set_delay(0, $delay);


  $results = $my_scanner->do_scan();
  
  
  foreach($results as $ip=>$ip_results) {
  	echo gethostbyaddr($ip)."\n<blockquote>\n";
    foreach($ip_results as $port=>$port_results) {
    	echo "\t".$port." : ".$port_results['pname']." : ";
      if ($port_results['status']==1){echo "open";}else {echo "closed";}
      echo "<br>\n";
    }
    echo "</blockquote>\n\n";
  }
  
  $per = "Scanning hosts... currently " . time();
	$shit = $stream->do_query("update scanupdate set percent='$per' where id=1","one");	
  
  flush();
  



break;

}


?>

</body>
</html>
