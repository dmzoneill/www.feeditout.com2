<?php

include("security.php");
include("header.php");
		$s_cookie = time()+43200;
		$s_session = time();
		$s_kkk = $stream->do_query("update users set cookie='$s_cookie' where username='" .$HTTP_SERVER_VARS['PHP_AUTH_USER'] ."'","one");
		$s_ggg = $stream->do_query("update users set cookie='expired' where cookie<$s_session","one");
?>

		
	<table width="100%" height=100% border="0" cellspacing="5" cellpadding="0"><tr>
	<td width=160 valign=top>
	
	
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				
				<?php print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Security level</h1> <div class=\"Box\">";
		?>
		<a href='index.php?page=access'>Want a higher access level?</a></div>
		
			</td></tr></table>
		</td></tr></table>
		<br>
	
				<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				
		<?php print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Stats</h1> <div class=\"Box\">";
		
		print "
		Serials : <b>$n_ser</b> entries.
		<br>
		Images : <b>$n_img</b> 
		<br>
		Comments : <b>$n_img_posts</b>
		<br>
		Users : <b>$n_usr</b>
		<br>
		Music : <b>$n_tks</b> tracks.<br>";
		
		
		print "</div>"; ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
	<?php
	
			$sqlg = $stream->do_query("select * from users where cookie!='expired'","array");

if(count($sqlg)>0){
?>
	
				<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				
		<?php print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Users Online</h1> <div class=\"Box\">";
		

	for($i=0;$i<count($sqlg);$i++){
		$tmp = $sqlg[$i];
		$id = $tmp[0];
		$name = $tmp[1];
		$pass = $tmp[2];   
		$act = $tmp[3];  
		$rank = $tmp[4]; 
		
		print "<img src='Images/member/$rank.gif'> <a href='index.php?page=memberlist'>$name</a><br>";
		
	}	
	
		
		print "</div>"; ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
	
	<?php
	}
else {
print "";
}		
?>
	
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				
<?php	
	$conts = $stream->do_query("select * from angelica where cont!='' order by stamp desc","array");
			
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Last 10 Gallery Comments</h1> <div class=\"Box\">";

	for($s=0;$s<10;$s++){
		$tmp = $conts[$s];
		$id = $tmp[0];
		$dir = $tmp[1];
		$img = $tmp[2];   
		
			
		$cont = htmlspecialchars(substr(strip_tags($tmp[3]),0,20));  
	
		$r = $s + 1;

		print "<b><img src='Images/quote.gif' border=0> <a href='gallery.php?img=Gallerys/$dir/$img'>$cont</a></b><br>";
				
		}
		
		print "</div>";  ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
	
	
			<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
			<?php	
			
			$sql = $stream->do_query("select * from users order by reged DESC","array");
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Last 10 members</h1> <div class=\"Box\">";

	for($i=0;$i<10;$i++){
		$tmp = $sql[$i];
		$id = $tmp[0];
		$name = $tmp[1];
		$pass = $tmp[2];   
		$act = $tmp[3];  
		$rank = $tmp[4]; 
		$ip = $tmp[5]; 
		$email = $tmp[6]; 
		$reged = $tmp[7]; 
		$access = date("j, Y, g:i a",$tmp[8]); 
		$details = $tmp[9]; 

		$rank = "<img src='Images/member/$rank.gif'>";
		
		print "$rank <b><a href='index.php?page=memberlist'>$name</a></b><br>";
		
		}

		print "</div>"; 

	?>
				
				</td></tr></table>
			</td></tr></table>
			<br>


	</td>
	<td width=* valign=top>
			<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor='#000000'><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor=#ffffff><tr><td>
					
					<?php 
					
					if(!$page){
					$page = "Welcome to Feeditout.com";
					}
					print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>" .ucwords($page) ."</h1> <div class=\"Box\">";		
						
					switch($page){
					
					default:					
					include("Pages/index.php");				
					break;
					
					case "about":					
					include("Pages/$page.php");					
					break;
					
					case "news":					
					include("Pages/$page.php");
					break;
					
					case "links":					
					include("Pages/$page.php");
					break;		
					
					case "serials":					
					include("Files/Serials/search.php");
					break;	
					
					case "predictive":					
					include("Files/Projects/Predicted/sms.php");
					break;	
					
					case "me":
					include("Pages/$page.php");
					break;				
					
					case "porn":
					print "yeah right ;)";
					break;

					case "handyprogs":
					break;

					case "bullshitprogs":
					break;

					case "evo":
					include("Pages/$page.php");
					break;

					case "phptask":
					include("Pages/$page.php");
					break;

					case "phone":
					include("Pages/$page.php");
					break;
					
					case "help":
					include("Pages/$page.php");
					break;

					case "contact":
					include("Pages/$page.php");
					break;
					
					case "signup":
					include("Pages/$page.php");
					break;
					
					case "music":
					include("Pages/$page.php");
					break;
					
					case "users":
					include("Pages/$page.php");
					break;
					
					case "memberlist":
					include("Pages/$page.php");
					break;
					
					case "dating":
					include("Pages/$page.php");
					break;
					
					case "access":
					include("Pages/$page.php");
					break;
					
					}
					
					?>
					
					
				</div></td></tr></table>
			</td></tr></table>
			<br>		
<div align='right'><img src='Images/mini.gif'></div>
	</td>
	<?php
	if($page=="index"){
	print "<td width=160 valign=top>";
	?>
	
	
				<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
							
<?php	
	$conts = $stream->do_query("select * from lasthit order by id DESC","array");
			
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Calendar</h1> <div class=\"Box\">";

	
	
require_once('class.Calendar.php');

$gyear = date("Y");
$gmonth = date("m");
$gmonthn = date("F");

$cal = new Calendar ('$gyear', '$gmonth' );
echo "<b>".$gmonthn."</b>"; 
echo $cal->display();

		
		print "</div>";  ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
		
	
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				
<?php	
	$conts = $stream->do_query("select * from serialterms order by stamp desc","array");
			
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Lastest News</h1> <div class=\"Box\">";

	print "Reports of another punishment beating have just come in, 
	see below <br><br><a href='gallery.php?img=Gallerys/Random Killings/sav.jpg'><img src='Gallerys/Random Killings/tn_sav.jpg' border=0></a>";
		
		print "</div>";  ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
	
	
	
	
					
	
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				
<?php	
	$conts = $stream->do_query("select * from serialterms order by stamp desc","array");
			
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Last 10 Serial Searches</h1> <div class=\"Box\">";

	for($s=0;$s<10;$s++){
		$tmp = $conts[$s];
		$id = $tmp[0];
		$term = $tmp[1];
		$stamp = $tmp[2];   
	
		$r = $s + 1;

		print "<b><img src='Images/serial.gif' border=0> <a href='index.php?page=serials&term=$term&dbcount=10000'>$term</a></b><br>";
				
		}
		
		print "</div>";  ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
	
	
			<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				 <div class="Box">	
<iframe src=userscan.php width="155" height=300 frameborder="0"></iframe>
		</div>
				</td></tr></table>
			</td></tr></table>
			<br>
	
	
	
	
	<?php
	
	print "</td>";
	
	}
	else {
	print "</td>";
	}
	?>
	
	</tr></table>
		
<?php include ("footer.php"); ?>
