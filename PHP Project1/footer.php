		
		
	</td></tr></table>
</td></tr></table>

<?php 
   $mtime1 = microtime(); 
   $mtime1 = explode(" ",$mtime1); 
   $mtime1 = $mtime1[1] + $mtime1[0]; 
   $endtime1 = $mtime1; 
   $totaltime1 = ($endtime1 - $starttime1); 
   echo "This page was created in ".$totaltime1." seconds<br>This page was hit $pagehits times."; 
?><br>
</center>
<br>

</body>
</html>
