<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
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

<?php
include("connect.php");
$prog = $stream->do_query("select percent from scanupdate where id=1","one");

print $prog;

?>
<script language=javascript>
setTimeout("document.location.href='scanprog.php?update=<?php print md5(time()); ?>'",5000);
</script>
</body>
</html>