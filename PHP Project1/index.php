<?php
// phpcs:ignoreFile
// jscpd:ignore-start

include("security.php");
include("header.php");
		$s_cookie = time()+43200;
		$s_session = time();
		/* @phpstan-ignore-line */ /** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $s_kkk = $stream->do_query("update users set cookie='$s_cookie' where username='" .$HTTP_SERVER_VARS['PHP_AUTH_USER'] ."'","one");
		/* @phpstan-ignore-line */ /** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $s_ggg = $stream->do_query("update users set cookie='expired' where cookie<$s_session","one");
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
		
		/* @phpstan-ignore-next-line */ print "
		Serials : <b>$n_ser</b> entries.
		<br>
		Images : <b>" /* @phpstan-ignore-line */ . $n_img . "</b> 
		<br>
		Comments : <b>" /* @phpstan-ignore-line */ . $n_img_posts . "</b>
		<br>
		Users : <b>" /* @phpstan-ignore-line */ . $n_usr . "</b>
		<br>
		Music : <b>$n_tks</b> tracks.<br>"/* @phpstan-ignore-line */ ;
		
		
		print "</div>"; ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
	<?php
	
			/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sqlg = $stream->do_query("select * from users where cookie!='expired'","array");

if(count($sqlg)>0){
?>
	
				<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				
		<?php print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Users Online</h1> <div class=\"Box\">";
		

	for($i=0;$i<count($sqlg);$i++){
		$tmp = $sqlg[$i];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $id = $tmp[0];
		$name = $tmp[1];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pass = $tmp[2];   
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $act = $tmp[3];  
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
	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $conts = $stream->do_query("select * from angelica where cont!='' order by stamp desc","array");
			
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Last 10 Gallery Comments</h1> <div class=\"Box\">";

	for($s=0;$s<10;$s++){
		$tmp = $conts[$s];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $id = $tmp[0];
		$dir = $tmp[1];
		$img = $tmp[2];   
		
			
		$cont = htmlspecialchars(substr(strip_tags($tmp[3]),0,20));  
	
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $r = $s + 1;

		print "<b><img src='Images/quote.gif' border=0> <a href='gallery.php?img=Gallerys/$dir/$img'>$cont</a></b><br>";
				
		}
		
		print "</div>";  ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
	
	
			<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
			<?php	
			
			/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $sql = $stream->do_query("select * from users order by reged DESC","array");
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Last 10 members</h1> <div class=\"Box\">";

	for($i=0;$i<10;$i++){
		$tmp = $sql[$i];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $id = $tmp[0];
		$name = $tmp[1];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $pass = $tmp[2];   
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $act = $tmp[3];  
		$rank = $tmp[4]; 
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $ip = $tmp[5]; 
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $email = $tmp[6]; 
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $reged = $tmp[7]; 
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $access = date("j, Y, g:i a",$tmp[8]); 
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $details = $tmp[9]; 

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
					
					/* @phpstan-ignore-line */ if(!$page){
					$page = "Welcome to Feeditout.com";
					}
					print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>" .ucwords($page) ."</h1> <div class=\"Box\">";		
						
					switch($page){
					
					default:					
					/* @phpstan-ignore-line */ /** @psalm-suppress MissingFile */ /** @psalm-suppress MissingFile */ include("Pages/index.php");				
					break;
					
					case "about":					
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");					
					break;
					
					case "news":					
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;
					
					case "links":					
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;		
					
					case "serials":					
					/* @phpstan-ignore-line */ /** @psalm-suppress MissingFile */ /** @psalm-suppress MissingFile */ include("Files/Serials/search.php");
					break;	
					
					case "predictive":					
					/* @phpstan-ignore-line */ /** @psalm-suppress MissingFile */ /** @psalm-suppress MissingFile */ include("Files/Projects/Predicted/sms.php");
					break;	
					
					case "me":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;				
					
					case "porn":
					print "yeah right ;)";
					break;

					case "handyprogs":
					break;

					case "bullshitprogs":
					break;

					case "evo":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;

					case "phptask":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;

					case "phone":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;
					
					case "help":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;

					case "contact":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;
					
					case "signup":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;
					
					case "music":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;
					
					case "users":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;
					
					case "memberlist":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;
					
					case "dating":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
					break;
					
					case "access":
					/** @psalm-suppress UnresolvableInclude */ /** @psalm-suppress UnresolvableInclude */ include("Pages/$page.php");
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
	/* @phpstan-ignore-line */ /** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $conts = $stream->do_query("select * from lasthit order by id DESC","array");
			
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Calendar</h1> <div class=\"Box\">";

	
	
require_once('class.Calendar.php');

/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $gyear = date("Y");
/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $gmonth = date("m");
$gmonthn = date("F");

/* @phpstan-ignore-line */ /** @psalm-suppress TooManyArguments */ /** @psalm-suppress TooManyArguments */ $cal = new Calendar ('$gyear', '$gmonth' );
echo "<b>".$gmonthn."</b>"; 
/* @phpstan-ignore-line */ echo $cal->display();

		
		print "</div>";  ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
		
	
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				
<?php	
	/* @phpstan-ignore-line */ /** @psalm-suppress UnusedVariable, UndefinedClass */ /** @psalm-suppress UnusedVariable, UndefinedClass */ $conts = $stream->do_query("select * from serialterms order by stamp desc","array");
			
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Lastest News</h1> <div class=\"Box\">"; // codespell:ignore lastest

	print "Reports of another punishment beating have just come in, 
	see below <br><br><a href='gallery.php?img=Gallerys/Random Killings/sav.jpg'><img src='Gallerys/Random Killings/tn_sav.jpg' border=0></a>"; // codespell:ignore sav
		
		print "</div>";  ?>
		
				</td></tr></table>
			</td></tr></table>
			<br>
	
	
	
	
					
	
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ffffff"><tr><td>
				
<?php	
	/* @phpstan-ignore-line */ /** @psalm-suppress UndefinedClass */ /** @psalm-suppress UndefinedClass */ $conts = $stream->do_query("select * from serialterms order by stamp desc","array");
			
	print "<h1 class=\"Band3\"><img src='Images/menu.gif' border=0>Last 10 Serial Searches</h1> <div class=\"Box\">";

	for($s=0;$s<10;$s++){
		$tmp = $conts[$s];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $id = $tmp[0];
		$term = $tmp[1];
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $stamp = $tmp[2];   
	
		/** @psalm-suppress UnusedVariable */ /** @psalm-suppress UnusedVariable */ $r = $s + 1;

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
<?php // jscpd:ignore-end ?>
