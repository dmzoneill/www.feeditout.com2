<?php include("connect.php"); ?>
<html>
<head>
<?php
print "<title>Welcome to feeditout.com " . $HTTP_SERVER_VARS['PHP_AUTH_USER'] . ", $page</title>";
include("http://www.feeditout.com/fed.php");

$stamp = time();
$fet = getenv("SCRIPT_URI"); 
if(!getenv("QUERY_STRING")==""){ 
if(stristr(getenv("QUERY_STRING"),"refresh")){
$str_len = strlen(getenv("QUERY_STRING"));
$str_len = substr(getenv("QUERY_STRING"), 0, $str_len-41); 
$fet .= "?$str_len";
}
else {
$fet .= "?".getenv("QUERY_STRING");
}
}
$fet = getenv("SCRIPT_URI"); 
$insert = $stream->do_query("insert into lasthit values('','$fet','$stamp')","one");
$pagehits = count($stream->do_query("select * from lasthit where url like '$fet'","array"));
?>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>
<body bgcolor='#ffffff'>
<center><br>
<table width="800" height=64 border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
	<table width="100%" height=64 border="0" cellspacing="1" cellpadding="15" background="Images/header.jpg" bgcolor="#CCCCCC"><tr><td>
		<center>
		<?php include("jmenu.php"); ?>
		</center>
	</td></tr></table>
</td></tr></table>
<table width="800" border="0" cellspacing="1" cellpadding="0"><tr><td>
	<table width="100%" border="0" cellspacing="1" cellpadding="5"><tr><td><div class="Box6">
<?php 
if($HTTP_SERVER_VARS['PHP_AUTH_USER']){
$imgg = $stream->do_query("select rank from users where username='" .$HTTP_SERVER_VARS['PHP_AUTH_USER'] ."'","one");
print "You are currently logged in as <b><font color=red> <img src='./Images/member/$imgg.gif' border=0> " .$HTTP_SERVER_VARS['PHP_AUTH_USER'] ."</font></b>. <a href='logout.php'><img src='Images/msn1.gif' border=0 Alt='Logout'></a><br>";
}
else {
print "Sign up now for access! <a href='index.php?page=signup'><img src='Images/msn.gif' border=0 Alt='Login'></a><br>";
}
print getenv("SCRIPT_URI"); 
if(!getenv("QUERY_STRING")==""){ 
if(stristr(getenv("QUERY_STRING"),"refresh")){
$str_len = strlen(getenv("QUERY_STRING"));
$str_len = substr(getenv("QUERY_STRING"), 0, $str_len-41); 
print "?$str_len";
}
else {
print "?".getenv("QUERY_STRING");
}
}
print "</div>"; 
?> 

	</td></tr></table>
</td></tr></table>

<table width="800" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
	<table width="100%" border="0" cellspacing="1" cellpadding="6" bgcolor="#9CCEF6"><tr><td>