<?php

include("connect.php");



   $envVars = array("HTTP_ACCEPT","HTTP_ACCEPT_CHARSET","HTTP_ACCEPT_ENCODING","HTTP_ACCEPT_LANGUAGE","HTTP_CONNECTION","HTTP_HOST","HTTP_REFERER","HTTP_USER_AGENT","REMOTE_ADDR","REMOTE_HOST","REMOTE_PORT","SCRIPT_FILENAME","SERVER_ADMIN","SERVER_PORT","SERVER_SIGNATURE","PATH_TRANSLATED","SCRIPT_NAME","REQUEST_URI","PHP_AUTH_USER","PHP_AUTH_PW","AUTH_TYPE");

   foreach($envVars as $var)   {
        $details .= "$var ^ ${$var}|\n";
   }

	$ip = "$REMOTE_ADDR";
	$access = time();
	$details = rawurlencode(htmlspecialchars($details));
	$sql = $stream->do_query("update users set ip='$ip', lastaccess='$access', details='$details' where username='".$HTTP_SERVER_VARS['PHP_AUTH_USER']."'","one");
		



$url = $HTTP_SERVER_VARS["PHP_SELF"];

if(!$page){
$page = "index";
}

if(securitylevel()==true){
	// this exception works grand , no i want an array of exceptions to check.. $var=$var 
}
else {
	if(authorized()==false){
	
	$sql = $stream->do_query("select security from securepages where pagename='$page'","one");

	if(strlen($sql)>0){
		$level = $sql;
	}
	else {
		$sql = $stream->do_query("insert into securepages values('','$page','1')","one");
		$sql = $stream->do_query("select security from securepages where pagename='$page'","one");
		$level = $sql;
	}
	
	$user = $HTTP_SERVER_VARS['PHP_AUTH_USER'];
	$rank = $stream->do_query("select rank from users where username='$user'","one");
	if(strlen($rank)>0){
		$rank = $rank;
	}
	else {
	$rank = 0;
	}
		
		header ('WWW-Authenticate: Basic realm="Security Level ' 
		.$level .' Required. Your Currrent Rank is ' 
		.$rank 	.'. Click Cancel to Signup or Exit"');
		
		header ('HTTP/1.0 401 Unauthorized');

		include("header.php");
		$c_u = $HTTP_SERVER_VARS['PHP_AUTH_USER'];
		$user = $HTTP_SERVER_VARS['PHP_AUTH_USER'];
		$rank = $stream->do_query("select rank from users where username='$user'","one");
		if($rank==""){
		$rank = "0 / Not Registered";
		}
		$level = $stream->do_query("select security from securepages where pagename='$page'","one");
		if($c_u=="") {
			$msg = "No Username was given<br><br><br><br><br>";
		}
		else {
			$msg = "The credentials for <b>$c_u</b> were incorrect<br><br>Security level <b>$level</b> Required<br>
		<b>$c_u's</b> Security Level is <b>$rank</b> <br><br><br><br>";
		}
	?>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor='#000000'><tr><td>
			<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor=#ffffff><tr><td>
	<?php
		echo "<table cellpadding=0 width=100% cellspacing=0 border=0><tr>";
		
			
		print "<td width=45%><center>";		
		print "<h1 class=\"Band3\">Sign Up!</h1><div class=\"Box\">";
		$page="signup";
		include("Pages/$page.php");
		print "</td><td width=10%><center></td>";
		
		print "<td width=45%><center>";
		print "<h1 class=\"Band3\">Security Login Attempted</h1>";
		print "<div class=\"Box\">Security Check Failed.<br><font class=\"Band8\"><br><br><br><br>Error : $msg<br></font><br><br><a href=";
		print getenv("SCRIPT_URI"); 
		if(strlen(getenv("QUERY_STRING"))>3){ 
		print "?".getenv("QUERY_STRING");
		}
		echo ">Try Again</a></div>";
		print "</td>";
		
		
		
		print "</tr></table>";
		
		
		print "</div></td></tr></table></td></tr></table>";
		
		include("footer.php");
		exit;
	}
}


?>