<?php

include("header.php");

?>


<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor='#000000'><tr><td>
				<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor=#ffffff><tr><td>
<?php
					
	if(!$page){
		$page = "Log out?";
	}
		print "<h1 class=\"Band3\">" .ucwords($page) ."</h1> <div class=\"Box\">";		
						
?>


<script type="text/javascript">
<!--

var answer = confirm ("We must clost the browser in order to sucessfully logout!")
if (answer){
window.opener=''; 
window.close();
}
else {
document.write("Logout cancelled");
}


// -->
</script> 

</div></td></tr></table>
			</td></tr></table>

<?php

include("footer.php");

?>