<?php

if((!$HTTP_SERVER_VARS['PHP_AUTH_USER']=="")){
$menu_t = "";
$logoutt = true;
}
else {
$menu_t = "[Login Required]";
$loginr = 1;
}
$craps = "refresh=" .md5(time());
?>


function cdd_menu740364(){//////////////////////////Start Menu Data/////////////////////////////////

//**** NavStudio, (c) 2004, OpenCube Inc.,  -  www.opencube.com ****
//Note: This data file may be manually customized outside of the visual interface.

    //Unique Menu Id
	this.uid = 740364


/**********************************************************************************************

                               Icon Images

**********************************************************************************************/


    //Inline positioned icon images (flow with the item text)

	this.rel_icon_image0 = "Images/1.gif"
	this.rel_icon_rollover0 = "Images/2.gif"
	this.rel_icon_image_wh0 = "9,9"




/**********************************************************************************************

                              Global - Menu Container Settings

**********************************************************************************************/


	this.menu_background_color = "#B1D3EC"
	this.menu_border_color = "#285577"
	this.menu_border_width = 1
	this.menu_padding = "2,4,2,4"
	this.menu_border_style = "solid"
	this.divider_caps = false
	this.divider_width = 2
	this.divider_height = 2
	this.divider_background_color = "#285577"
	this.divider_border_style = "none"
	this.divider_border_width = 0
	this.divider_border_color = "#000000"
	this.menu_is_horizontal = false
	<?php
	if($loginr==1){
	print "this.menu_width = \"250\"\n";
	}
	else {
	print "this.menu_width = \"180\"\n";
	}
	?>
	this.menu_xy = "-80,-2"
	this.menu_scroll_direction = 1
	this.menu_scroll_reverse_on_hide = false
	this.menu_scroll_delay = 0
	this.menu_scroll_step = 8




/**********************************************************************************************

                              Global - Menu Item Settings

**********************************************************************************************/


	this.icon_rel = 0
	this.menu_items_text_color = "#4C7899"
	this.menu_items_text_decoration = "none"
	this.menu_items_font_family = "Arial"
	this.menu_items_font_size = "11px"
	this.menu_items_font_style = "normal"
	this.menu_items_font_weight = "normal"
	this.menu_items_text_align = "left"
	this.menu_items_padding = "4,5,4,5"
	this.menu_items_border_style = "solid"
	this.menu_items_border_width = 0
	this.menu_items_width = 90
	this.menu_items_text_color_roll = "#0066B2"




/**********************************************************************************************

                              Main Menu Settings

**********************************************************************************************/


        this.menu_background_color_main = "#B1D3EC"
        this.menu_items_background_color_main = "#B1D3EC"
        this.menu_items_background_color_roll_main = "#B1D3EC"
        this.menu_items_text_color_main = "#142A3B"
        this.menu_items_text_color_roll_main = "#0066B2"
        this.menu_border_color_main = "#285577"
        this.menu_items_border_color_main = "#FF6600"
        this.menu_items_border_color_roll_main = "#FF6600"
        this.menu_is_horizontal_main = true
        this.divider_background_color_main = "#285577"


<?php 
//top menu
if($logoutt){
	$menu = array("Main,1","Projects,1","Stuff,1","Gallerys,1","Music,1","Help,1");
}
else {
	$menu = array("Main,1","Projects,1","Stuff,1","Gallerys,1","Music,1","Help,1");
}

for($x=0;$x<count($menu);$x++){
	$crap = explode(",",$menu[$x]);
	if($crap[1]==1){
		print "this.item$x = \"$crap[0]\"\n";
	}
	else {
		$x = $x -1;
	}
}


//sub menu


?>




    //Sub Menu 0

        this.item0_0 = "Main Page"
        this.item0_1 = "About What?"
        this.item0_2 = "News What?"
        this.item0_3 = "Links"
		<?php if($logoutt){
		print "\n
		this.item0_4 = \"Logout ". $HTTP_SERVER_VARS['PHP_AUTH_USER']."\"
		";
		}
		?>
		
        this.url0_0 = "index.php?<?php print $craps; ?>"
        this.url0_1 = "index.php?page=about&<?php print $craps; ?>"
        this.url0_2 = "index.php?page=news&<?php print $craps; ?>"
        this.url0_3 = "index.php?page=links&<?php print $craps; ?>"
		<?php if($logoutt){
		print "\n
		this.url0_4 = \"logout.php\"
		";
		}
		?>
		 


    //Sub Menu 1

        this.item1_0 = "Evolution <?php print "$menu_t"; ?>"
        this.item1_1 = "Windows PHP Task Killer <?php print "$menu_t"; ?>"
		this.item1_2 = "Nethouse Phone Rates"
		this.item1_3 = "Predictive Text <?php print "$menu_t"; ?>"
     
        this.url1_0 = "index.php?page=evo&<?php print $craps; ?>"
        this.url1_1 = "index.php?page=phptask&<?php print $craps; ?>"
		this.url1_2 = "index.php?page=phone&<?php print $craps; ?>"
		this.url1_3 = "index.php?page=predictive&<?php print $craps; ?>"



    //Sub Menu 2

		this.item2_0 = "Serial Search <?php print "$menu_t"; ?>"
		
		this.url2_0 = "index.php?page=serials&<?php print $craps; ?>"
		

    //Sub Menu 3

<?php 
if ($handle = opendir('./Gallerys/')) {
   $x=0;
   
   $ret = array();
   
   while ($file = readdir($handle)) { 
   		if(!is_writable("./Gallerys/$file")){
			continue;		
		}
       if ($file != "." && $file != ".."){ 
	       
		   array_push($ret,"$file");
		   $x++;
		
       } 
   }
   
   sort($ret);
	reset($ret);
   
   for($w=0;$w<count($ret);$w++){
   		print "this.item3_$w = \"$ret[$w]  $menu_t\"\n";
		print "this.url3_$w = \"gallery.php?dir=$ret[$w]&$craps\"\n";
   
   }
   
    echo "this.item3_$x = \"Upload A Pic $menu_t\"\n";
	echo "this.url3_$x = \"gallery.php?page=upload\"\n";
	$x++;
	echo "this.item3_$x = \"User Gallerys $menu_t\"\n";
	echo "this.url3_$x = \"gallery.php?dir=User\"\n";
   closedir($handle); 
}
?> 

    //Sub Menu 4

        this.item4_0 = "The Player <?php print "$menu_t"; ?>"
        this.item4_1 = "Upload Music <?php print "$menu_t"; ?>"
        this.item4_2 = "Request Music <?php print "$menu_t"; ?>"
        this.item4_3 = "Warranty & Copyright <?php print "$menu_t"; ?>"
		this.item4_3 = "My Music Database <?php print "$menu_t"; ?>"
				
        this.url4_0 = "index.php?page=music"
        this.url4_1 = "index.php?page=music&music=form&<?php print $craps; ?>"
        this.url4_2 = "index.php?page=music&music=request&<?php print $craps; ?>"
        this.url4_3 = "index.php?page=music&music=database&<?php print $craps; ?>"
		

    //Sub Menu 5

        this.item5_0 = "Help"
        this.item5_1 = "Contact Us <?php print "$menu_t"; ?>"
		this.item5_2 = "Member List <?php print "$menu_t"; ?>"
        this.item5_3 = "Site Administration"
        this.item5_4 = "Personal Settings"
		this.item5_5 = "PhpMyAdmin"
		
        this.url5_0 = "index.php?page=help&<?php print $craps; ?>"
        this.url5_1 = "index.php?page=contact&<?php print $craps; ?>"
		this.url5_2 = "index.php?page=memberlist&<?php print $craps; ?>"
        this.url5_3 = "http://www.feeditout.com/siteadmin"
        this.url5_4 = "http://www.feeditout.com/personal"
		this.url5_5 = "http://www.feeditout.com/Files/PhpMyAdmin"
		


}///////////////////////// END Menu Data /////////////////////////////////////////