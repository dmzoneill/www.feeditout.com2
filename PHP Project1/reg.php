<?php

include("connect.php");

$fp = fopen("port.txt","r");

while(!feof($fp)){

$line = fgets($fp,1024);

$c = preg_split ("/[\s,]+/", "$line");


//preg_match("port.[0-9]+",$line,$match);
$sql =  "insert into porttrojans values('','$c[1]','$c[2] $c[3] $c[4] $c[5] $c[6] $c[7] $c[8] $c[9] $c[10] $c[11] $c[12] $c[13]')";
$stream->do_query($sql,"one");


}?>