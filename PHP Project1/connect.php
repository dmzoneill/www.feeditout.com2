<?php


   $mtime1 = microtime(); 
   $mtime1 = explode(" ",$mtime1); 
   $mtime1 = $mtime1[1] + $mtime1[0]; 
   $starttime1 = $mtime1; 


$fcwhost = "localhost"; //216.26.131.80 
$fcwusername = "dave"; 
$fcwpassword2 = "megadude"; 
$fcwdb_name = "dave3";
$fcwdb_type = "mysql";



include($path."db_".$fcwdb_type.".php");
$stream = new db;
$stream->connect();


ob_start();


$back = "<a href='javascript:history.back(-1);'>Back</a>";

$n_ser = 75411;
$n_img = count($stream->do_query("select * from angelica","array"));
$n_img_posts = count($stream->do_query("select * from angelica where cont!=''","array"));
$n_usr = count($stream->do_query("select * from users","array"));
$n_tks = 56837;

require_once("functions.php");