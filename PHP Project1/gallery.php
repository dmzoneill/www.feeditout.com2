<?php 
include("security.php");
include("header.php");

if($img){
$sql = explode("/",$img);
$dir = $sql[1];
$image = $sql[2];
$cont = $stream->do_query("select cont from angelica where dir='$dir' AND img='$image'","one");


if($addmsg){
if(($msgr) && ($dir) && ($image)){
$msgr = nl2br(htmlspecialchars(stripslashes($msgr)));
$msgr = "$cont<br><b><font color=red>$title</font></b>.<br>$msgr<br>Posted by " .$HTTP_SERVER_VARS['PHP_AUTH_USER'] .".<br>";
$stamp = time();
$sql = $stream->do_query("update angelica set cont='$msgr',stamp='$stamp' where dir='$dir' AND img='$image'","one");
$feeditout =  "Message Added, view above<br>";
$cont = $msgr;
}
else {
$feeditout =   "No message sent <br>$back";
}
}
else {

$feeditout .= "Add your comment <font color=red>" . $HTTP_SERVER_VARS['PHP_AUTH_USER'] ."</font>.<br><form action='gallery.php?addmsg=true&img=Gallerys/$dir/$image' method='post'>";
$feeditout .= "Title<br><input type=text name='title'><br>";
$feeditout .= "Message<br><textarea cols=40 rows=5 name=msgr></textarea>";
$feeditout .= "<br><input type=submit value='Add Message'><br>";
$feeditout .= "</form>"; 

}


print "<div align=center><table width=\"100%\ border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#000000\"><tr><td>
<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#ffffff\"><tr><td>";
print "<center><img src=\"$img\" border=0 width=600 height=480>";
print "</center>";
print "</td></tr></table></td></tr></table>";

print "<div align=center><br><br><table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#000000\"><tr><td>
<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#ffffff\"><tr><td>";
print "<div class=\"Box\"> <h1 class=\"Band3\">Comments</h1><div class=\"Box\">$cont </div></div><br>";
print "<div class=\"Box\"> <h1 class=\"Band3\">Add Your Comments</h1><div class=\"Box\">";

print $feeditout;

print "</div></div></td></tr></table></td></tr></table></div>";
}
else {

print "<div align=center><table width=\"100\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#000000\"><tr><td>
<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#B1D3EC\"><tr><td>";
print "<img src=Images/ex.gif>";
print "</td></tr></table></td></tr></table></div>";

}




if($dir){
	?><br><br>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor='#000000'><tr><td>
			<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor=#ffffff><tr><td>
			
	<?php
$dir1 = "$dir";
$dir = "Gallerys/$dir";

print "<center> <h1 class=\"Band3\">$dir1</h1> <br><br>\n";
$BASEDIR="$dir";
print "<div class=\"Box\"><table cellpadding=0 cellspacing=0 border=0 width=80%><tr>\n";
function recursedir($BASEDIR) {
global $stream;
       $x=0;
	   $hndl=opendir($BASEDIR);
       while($file=readdir($hndl)) {
        if ($file=='.' || $file=='..') continue;
		if(stristr($file,"tn_")) continue;
		if($x%5>0){
		print " ";
		}
		else {
		print "</tr><tr>\n";
		}
			$completepath="$BASEDIR/$file";
		
       	 	$sql = explode("/",$BASEDIR);
			$dir = $sql[1];
			$image = $file;
			$exists = $stream->do_query("select dir from angelica where img='$image' AND dir='$dir'","one");
			if(strlen($exists)<2){
			$sql = $stream->do_query("insert into angelica values('','$dir','$image','','')","one");
			}
			$cont = strlen($stream->do_query("select cont from angelica where dir='$dir' AND img='$image'","one"));
			if($cont>3) { $msg = "Commented"; }
			else { $msg = ""; }
			if($msg=="Commented"){
			$border=1;
			$shit = "class=image";
			}
			else {
			$border=0;
			$shit = "";
			}
			$thumb = "tn_" .eregi_replace("JPG","jpg",$file);
         print "<td width=110><center>";
		 print "<a href='gallery.php?img=$BASEDIR/$file'><img $shit border=$border src='$BASEDIR/$thumb'></a><br><br></td>\n";
		 $x++;
    }
}
recursedir($BASEDIR);

print "</tr></table></center>";
print "</div></td></tr></table></td></tr></table>";

}
else {

print("no directory selected");


}

include ("footer.php"); 

?>
