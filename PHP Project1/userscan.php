<?php	

	
	
	include("scanner_class.php");
	
	$host = $REMOTE_ADDR;
$hostend = $REMOTE_ADDR;
$ports = "21,80,22,23,81,4662,4672";
$wait = 0;
$delay = 80;

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
	
	
?>