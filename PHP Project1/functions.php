<?php



function authorized(){
	global $stream, $HTTP_SERVER_VARS,$details;
	if (checklogin($HTTP_SERVER_VARS['PHP_AUTH_USER'], $HTTP_SERVER_VARS['PHP_AUTH_PW'])==false){
		return false;
	} 
	else {
		return true;
	}
}



function getaddress($dude){
	global $stream;
	$sql = $stream->do_query("select * from users where username='$dude'","array");

	for($i=0;$i<count($sql);$i++){
		$tmp = $sql[$i];
		$id = $tmp[0];
		$name = $tmp[1];
		$pass = $tmp[2];   
		$act = $tmp[3];  
		$rank = $tmp[4]; 
		$email = $tmp[6]; 
		
	}
	return $email;

}




function securitylevel(){
global $stream, $page, $img, $dir, $HTTP_SERVER_VARS;

	if(($dir) || ($img)){
	$page = "gallerys";
	}
	
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
	
	if($level==0){
	return true;
	}
	else {
	
	if($level<=$rank){
		return true;
	}
	else {
		return false;
	}
	}	
}





function checklogin($c_user, $c_pass){
global $stream,$REMOTE_ADDR;

	if ($c_user==''){
	return false;
	}

	$sql = $stream->do_query("select * from users where username='$c_user'","array");

	for($i=0;$i<count($sql);$i++){
		$tmp = $sql[$i];
		$id = $tmp[0];
		$name = $tmp[1];
		$pass = $tmp[2];   
		$act = $tmp[3];  
		$rank = $tmp[4]; 
		$c_pass = md5($c_pass);
		if (($pass==$c_pass) && (securitylevel()==true)){
			return true;
		} else {
			return false;
		}
	}
	return false;
}





function level($person,$sl){
global $stream, $HTTP_SERVER_VARS;

	$level = $sl;
	$user = $person;
	$rank = $stream->do_query("select rank from users where username='$user'","one");
	
	if($level<=$rank){
		return true;
	}
	else {
		return false;
	}
}






?>