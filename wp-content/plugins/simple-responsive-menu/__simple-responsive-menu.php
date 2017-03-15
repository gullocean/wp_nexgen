<?php
/*
Plugin Name: Simple Responsive Menu
Plugin URI: http://wordpress.org/support/plugin/simple-responsive-menu
Description: This plugin is convert WordPress menus to Simple Responsive Menus.
Version: 2.1
Author: SutharInfo
License: GPL2
*/
  
/* DEFAULT SR-MENU CSS */
define('SR_BG_L1','#0a0a0a');
define('SR_BG_L2','#0f0f0f');
define('SR_BG_L3','#1b1b1b');
define('SR_BORDER','#000000');
define('SR_MENU_BG','#020202');
define('SR_MENU_TITLE','Menu');
define('SR_FONT_CLR','#FFFFFF');
define('SR_FONT_HVR','#CA3C08');
  
// Hook for adding admin menus
add_action('admin_menu', 'sr_menu_plugin_admin_menu');
function sr_menu_plugin_admin_menu(){
	add_menu_page('Responsive Menu Settings ', 'SR Menu', 'publish_posts', 'responsive', 'settings_menu');
}

function settings_menu(){
?>
<div class="wrapper">

	<div class="wrap" style="float:left; width:100%;">
		<style type="text/css">
        .spn_clr{ height:20px;border:1px solid #000;padding-left: 16px;}
        .frm_setting{ border:1px solid #4F8A10; padding-bottom:20px; margin-top:20px;}
        .lbl_setting{ margin-left:5px; padding:0 5px;color:#4F8A10; text-transform:uppercase;}
        .sr_right_bar{float:right;margin-top:20px;color: #4F8A10;width:27%;float:left; margin-left:15px;margin-top: 38px;}
        .sr_green_border{ padding:15px;background: #DFF2BF;border: 1px solid #4F8A10;}
        .sr_right_box_color{ margin-top:20px;}
		.sr_right_box_donate input{ padding:8px;}
		.si_theme .form-table { margin-left:15px;}
		.si_theme .form-table th, .si_theme .form-table label { font-size: 12px; font-weight: normal !important;}
        </style>
        <div id="icon-options-general" class="icon32"><br />
        </div>
		<h2>Responsive Menu Settings</h2>
      
      <div class="main_div">
    	<div class="metabox-holder" style="width:70%; float:left;">
        <?php 
				$options = array (
					   'sr_menu_bg',
					   'sr_menu_title',
					   'sr_level_bg1',
					   'sr_level_bg2',
					   'sr_level_bg3',
					   'sr_menu_title',
					   'sr_menu_toggle',
					   'sr_font_color',
					   'sr_font_hover',
					   'sr_border_color',
					   'sr_custom_css'
				   
		        );
		   
			   if($_REQUEST['sr_reset']=='reset'){
				   
					  foreach ( $options as $opt )
					  {
						  delete_option ( 'si_'.$opt, $_POST[$opt] );
						  $_POST[$opt]='';
						  add_option ( 'si_'.$opt, $_POST[$opt] );	
					  }
				}
			 
			   if ( count($_POST) > 0 && isset($_POST['si_settings'])){
					   
					  foreach ( $options as $opt )
					  {
						  delete_option ( 'si_'.$opt, $_POST[$opt] );
						  add_option ( 'si_'.$opt, $_POST[$opt] );	
					  }
			   }
			   sr_si_settings();
	    ?>
         </div>
         
          <div class="sr_right_bar">
             <div class="sr_green_border sr_right_box_donate">
                 <div class="fballwelcome-panel" style="margin:0; padding:5px; line-height: 24px;">
           
                      
                      
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="C2HLQWG2CPZW4">

<p>If you like my works/efforts don't forget to donate to support further development.

With your help I can make my works/plugins even better!

$5, $10 or $15 any amount is fine with me !!!</p>
<table align="left">
<tr><td><input type="hidden" name="on0" value="Yours Donation"></td></tr><tr><td><select name="os0">
	<option value="Option 1">$15.00 USD</option>
	<option value="Option 2">$10.00 USD</option>
	<option value="Option 3">$5.00 USD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="<?php echo plugins_url( 'images/make_donate.gif', __FILE__ );?>" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>



                   </div>
               </div>
             <div class="sr_green_border sr_right_box_color">
             Get darker/lighter shades of any color.<br />Please use <a style="font-weight:bold;" href="http://www.w3schools.com/tags/ref_colorpicker.asp" target="_blank">HTML Colorpicker</a> - select color then copy color code and paste in textbox.<br /><br />
             
             <img src="<?php echo plugins_url( 'images/color_picker.jpg', __FILE__ );?>" alt="" width="286px;" />
             
             
             </div>
        </div><!--.sr_right_bar-->
         
        <div> 
    </div><!--.wrap-->
    	
       
    
</div><!--.wrapper-->
<?php
}
  
function sr_set_label($for,$text){
	 return '<label for="'.$for.'">'.$text.'</label>';
 }
 
function sr_set_textbox($name,$value){
	 if(get_option('si_'.$name)){
		  $si_value = get_option('si_'.$name);
	 }else{
		 $si_value = $value;
	 }
	 return '<input name="'.$name.'" type="text" id="'.$name.'" value="'.$si_value.'" class="regular-text" />';
}

function sr_set_textarea($name){
	 return '<textarea name="'.$name.'" id="'.$name.'" rows="5" cols="50" >'.get_option("si_".$name).'</textarea>';
}
  
function sr_set_css($cls,$clr){

		if(get_option($cls)!=''){
			return $level_bg1 = get_option($cls);
		}else{
			return $level_bg1 =$clr;
		}
}
  
function sr_si_settings(){
	  
	/* MENU LEVEL -1 */
	$level_bg1 = sr_set_css('si_sr_level_bg1',SR_BG_L1);
		
	/* MENU LEVEL -2 */
	$level_bg2 = sr_set_css('si_sr_level_bg2',SR_BG_L2);
		
	/* MENU LEVEL -3 */
	$level_bg3 = sr_set_css('si_sr_level_bg3',SR_BG_L3);
	
	/* MENU TITLE BG */
	$menu_bg = sr_set_css('si_sr_menu_bg',SR_MENU_BG); 
	
	/* MENU TITLE */
	$menu_title = sr_set_css('si_sr_menu_title',SR_MENU_TITLE);
	
	/* MENU FONT COLOR */
	$si_sr_font_color = sr_set_css('si_sr_font_color',SR_FONT_CLR);
	
	/* MENU FONT COLOR HOVER */
	$si_sr_font_hover = sr_set_css('si_sr_font_hover',SR_FONT_HVR);
	
	/* MENU BORDER COLOR */ 
	$si_sr_border_color = sr_set_css('si_sr_border_color',SR_BORDER);
?>
    <fieldset class="frm_setting">
    <legend class="lbl_setting"><strong >General Settings</strong></legend>
    <div class="si_theme">
      <form method="post" action="">
        <table class="form-table">
         <tr valign="top">
            <th scope="row"><?php echo sr_set_label('sr_menu_title','Menu Title');?></th>
            <td><?php echo sr_set_textbox('sr_menu_title',SR_MENU_TITLE);?> </td>
          </tr>
          
          <tr valign="top">
            <th scope="row"><?php echo sr_set_label('sr_menu_bg','Menu Title Background');?></th>
            <td><?php echo sr_set_textbox('sr_menu_bg',SR_MENU_BG);?> <span style="background-color:<?php echo $menu_bg;?>;" class="spn_clr"></span></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php echo sr_set_label('sr_level_bg1','Menu Level-1 Background');?></th>
            <td><?php echo sr_set_textbox('sr_level_bg1',SR_BG_L1);?> <span style="background-color:<?php echo $level_bg1;?>;" class="spn_clr"></span></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php echo sr_set_label('sr_level_bg2','Menu Level-2 Background');?></th>
            <td><?php echo sr_set_textbox('sr_level_bg2',SR_BG_L2);?> <span style="background-color:<?php echo $level_bg2;?>;" class="spn_clr"></span></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php echo sr_set_label('sr_level_bg3','Menu Level-3 Background');?></th>
            <td><?php echo sr_set_textbox('sr_level_bg3',SR_BG_L3);?> <span style="background-color:<?php echo $level_bg3;?>;" class="spn_clr"></span></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php echo sr_set_label('sr_font_color','Menu Font Color');?></th>
            <td><?php echo sr_set_textbox('sr_font_color',SR_FONT_CLR);?> <span style="background-color:<?php echo $si_sr_font_color;?>;" class="spn_clr"></span></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php echo sr_set_label('sr_font_hover','Menu Font Color On Mouse Hover');?></th>
            <td><?php echo sr_set_textbox('sr_font_hover',SR_FONT_HVR);?> <span style="background-color:<?php echo $si_sr_font_hover;?>;" class="spn_clr"></span></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php echo sr_set_label('sr_border_color','Menu Border Color');?></th>
            <td><?php echo sr_set_textbox('sr_border_color',SR_BORDER);?> <span style="background-color:<?php echo $si_sr_border_color;?>;" class="spn_clr"></span></td>
          </tr>
          <tr  valign="top">
            <th scope="row"><?php echo sr_set_label('sr_menu_toggle','Menu Toggle Off');?></th>
            <td><input type="checkbox" name="sr_menu_toggle"   id="sr_menu_toggle" 
			<?php if(get_option("si_sr_menu_toggle")==1){ echo "checked='checked'";}?> value="1" /></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php echo sr_set_label('sr_custom_css','Custom CSS');?></th>
            <td><?php echo sr_set_textarea('sr_custom_css');?></td>
          </tr>
          <tr valign="top">
            <th scope="row"></th>
            <td>     
            <input type="submit" name="Submit" class="button-primary" value="Save Changes" />
            <input type="hidden" name="si_settings" value="save" style="display:none;" />
           </td>
          </tr>
        </table>
      </form>
    </div>
    
   </fieldset>
   
   <fieldset class="frm_setting">
    <legend class="lbl_setting"><strong >Default Settings</strong></legend>
    <div style="margin:20px 20px 0 20px;">
      <form method="post" action="">
        <input type="submit" name="Submit" class="button-primary" value="Default Setting" />
        <input type="hidden" name="sr_reset" value="reset" style="display:none;" />
        
       <br /><br />
       

1. Add shortcode in your theme(header.php) or replace your current menu.<br />
<div style=" color: #4F8A10; margin: 10px;text-align: center;  width: 416px;">
[srMenu theme_location=primary]<br />
				OR<br />
&lt;?php echo do_shortcode('[srMenu theme_location=primary]');?&gt;<br />
</div>
2. Go to "Dashboard" => "SR Menu" section and set your general option settings.<br />
3. For multi-level menu<br />
 * Go to  "Dashboard" => "Appearance" => "Menus".<br />
 * "Edit/Create Menus" and "Manage Locations".<br />
 * Help for developers you can manage menu location in shortcode "[srMenu theme_location=primary]"
      </form>
    </div>
     </fieldset>
<?php
}
  
function build_stylesheet_url(){
	  	
	/* MENU LEVEL -1 */
	$level_bg1 = sr_set_css('si_sr_level_bg1',SR_BG_L1);
		
	/* MENU LEVEL -2 */
	$level_bg2 = sr_set_css('si_sr_level_bg2',SR_BG_L2);
		
	/* MENU LEVEL -3 */
	$level_bg3 = sr_set_css('si_sr_level_bg3',SR_BG_L3);
	
	/* MENU TITLE BG */
	$menu_bg = sr_set_css('si_sr_menu_bg',SR_MENU_BG); 
		
	/* MENU FONT COLOR */
	$si_sr_font_color = sr_set_css('si_sr_font_color',SR_FONT_CLR);
	
	/* MENU FONT COLOR HOVER */
	$si_sr_font_hover = sr_set_css('si_sr_font_hover',SR_FONT_HVR);
	
	/* MENU BORDER COLOR */ 
	$si_sr_border_color = sr_set_css('si_sr_border_color',SR_BORDER);
		
	/* MENU TOGGLE */
	if(get_option('si_sr_menu_toggle')==1){
	    $si_sr_menu_toggle= '.main-navigation-srm .nav-menu-srm {display: block ;}';
	}else{
		$si_sr_menu_toggle='.main-navigation-srm .nav-menu-srm {display: none ;}';
    }
	  
?>
<style type="text/css">
<?php echo get_option('si_sr_custom_css');?>
ul, ol{ padding:0; margin:0; }
.nav-menu-srm { background-color: <?php echo $level_bg1;?>;/*LEVEL-1****/ } 
.nav-menu-srm li li { background-color: <?php echo $level_bg2;?>!important; /*LEVEL-2****/	}  
.nav-menu-srm li li li { background-color: <?php echo $level_bg3;?>!important; /*LEVEL-2****/	} 
.nav-menu-srm li a:hover , .nav-menu-srm li li a:hover , .nav-menu-srm li li li a:hover ,  .nav-menu-srm li a {
	color: <?php echo $si_sr_font_hover;?>!important; /*MENU FONT COLOR HOVER*/
	text-decoration:none;
	background:none !important;
}
.nav-menu-srm li a {
	color: <?php echo $si_sr_font_color;?>!important; /*MENU FONT COLOR HOVER*/
	text-decoration:none;
	background:none !important;
	padding:11px;
	line-height: 1.5;
}
.main-navigation-srm li a { border:none !important;}
.nav-menu-srm .current-menu-item > a {color:<?php echo $si_sr_font_hover;?>!important;/*MENU FONT COLOR HOVER*/}

/* Primary Navigation */
.main-navigation-srm .menu-toggle { display: none; padding: 0; }
.main-navigation-srm .nav-menu-srm { border-bottom: 0; display: block; }
.main-navigation-srm.toggled-on { border-bottom: 0; margin: 0; padding: 0; }
.main-navigation-srm li { border: 0; display: inline-block; position: relative; }
.main-navigation-srm a { display: inline-block; padding: 0 12px; white-space: nowrap; }
.main-navigation-srm ul ul {float: left;margin: 0;position: absolute;left: -999em;z-index: 99999; }
.main-navigation-srm li li { border: 0;display: block;height: auto;line-height: 1.0909090909; }
.main-navigation-srm ul ul ul { left: -999em;top: 0; }
.main-navigation-srm ul ul a { white-space: normal;min-width: 176px; }

.main-navigation-srm ul li:hover > ul, .main-navigation-srm ul li.focus > ul { left: auto; }
.main-navigation-srm ul ul li:hover > ul, .main-navigation-srm ul ul li.focus > ul { left: 100%; }
.main-navigation-srm .menu-item-has-children > a,
.main-navigation-srm .page_item_has_children > a { padding-right: 26px; }
.main-navigation-srm .menu-item-has-children > a:after,
.main-navigation-srm .page_item_has_children > a:after {
		-webkit-font-smoothing: antialiased;
		display: inline-block;
		font: normal 8px/1 Genericons;
		position: absolute;
		right: 12px;
		top: 22px;
		vertical-align: text-bottom;
}
.main-navigation-srm li .menu-item-has-children > a,
.main-navigation-srm li .page_item_has_children > a { padding-right: 20px; min-width: 168px; }
.sr-menu-toggle{ display:none;}
.nav-menu-srm li li { border-bottom: 1px solid <?php echo $si_sr_border_color;?>!important;/* MENU BORDER COLOR*/ }


 
@media screen and (max-width: 768px) {
.nav-menu-srm  li { border-bottom: none!important;/* MENU BORDER COLOR*/ }
.nav-menu-srm li { border-top: 1px solid <?php echo $si_sr_border_color;?>;/* MENU BORDER COLOR*/ }
.sr-menu-toggle{ display:block;}
.nav-menu-srm > li li { border-bottom: none;/* MENU BORDER COLOR*/ }
.nav-menu-srm li  ul { position: absolute;  left: -9999px !important;  min-width: 200px;  }
.nav-menu-srm > li.hover > ul {  left: 0;  }
.nav-menu-srm li li.hover ul {  left: 100%;  top: 0;  }
ul.nav-menu-srm{ display: block ;}
.main-navigation-srm ul li:hover > ul { display:none;}
.main-navigation-srm ul li.minus > ul { display:block;  position: static !important;}
.main-navigation-srm ul li  > ul { display:block;}
<?php echo $si_sr_menu_toggle;?>
.main-navigation-srm nav,.main-navigation-srm ul,.main-navigation-srm li,.main-navigation-srm a  {margin: 0; padding: 0; font-size:12px !important; text-align: left;}
.main-navigation-srm .current-menu-item > a{ color:<?php echo $si_sr_font_hover;?>!important;/*MENU FONT COLOR HOVER*/ }
.nav-menu-srm li a:hover { color: <?php echo $si_sr_font_hover;?>!important; /*MENU FONT COLOR HOVER*/ text-decoration:none; }
.main-navigation-srm ul{ float:none !important;}
.main-navigation-srm .current-menu-item a:hover{ color:<?php echo $si_sr_font_color;?>!important;/*MENU FONT COLOR */ }
.nav-menu-srm a {
	padding-bottom: 11px!important;
	padding-left: 15px!important;
	padding-right: 15px!important;
	padding-top: 9px!important;
	color:<?php echo $si_sr_font_color;?>!important;/*MENU FONT COLOR */
	outline:none;
}
.nav-menu-srm { list-style: none;*zoom: 1;background-color: <?php echo $level_bg1;?>;/*LEVEL-1****/ } 
.nav-menu-srm > li {
	position: relative;
	float: left;
	/*border-top: 1px solid <?php echo $si_sr_border_color;?>;*//* MENU BORDER COLOR*/ 
	display:block;
}
.nav-menu-srm ul > li { border-top: 1px solid <?php echo $si_sr_border_color;?>;/* MENU BORDER COLOR*/ }
.nav-menu-srm .sub-menu li a{background: none!important;}
.nav-menu-srm > li > a {
	display: block;
	border-bottom-color: -moz-use-text-color;
	border-bottom-style: none;
	border-bottom-width: 0;
	white-space: nowrap;
}
.nav-menu-srm li li {
	display: block;
	position: relative;
	white-space: normal;
	background-color: <?php echo $level_bg2;?>!important; /*LEVEL-2****/
	z-index: 100;
}
.nav-menu-srm li li li { background:<?php echo $level_bg3;?>!important; /*LEVEL-3****/ z-index:200; }
.main-navigation-srm .active { display: block; }
.main-navigation-srm .sr-toggleMenu{padding: 10px 30px;}
.nav-menu-srm > li { float: none; }
.nav-menu-srm > li > .parent {  background-position: 95% 50%; background:none; }
.nav-menu-srm li .parent {  margin-right: 13px; }
.nav-menu-srm ul {  display: block; width: 100%; list-style: none; }
.nav-menu-srm li li a ,.nav-menu-srm li li li a{ background:none;}
.nav-menu-srm > li.hover > ul , .nav-menu-srm li li.hover ul { /* position: static; */ }
.main-navigation-srm ul a{ border-bottom:none !important;}
.main-navigation-srm ul { display: block; border:none!important;}
.nav-menu-srm li{ display:block;}
.nav-menu-srm li li li a {  background:<?php echo $level_bg3;?>; /*LEVEL-3****/}
.nav-menu-srm a { padding-top: 10px; display: block; }
.nav-menu-srm > li li.minus .parent {
	background:url('<?php echo plugins_url( 'images/rArrow.png', __FILE__ );?>') right 14px no-repeat transparent!important;
	width:auto;
}
.nav-menu-srm > li li.plus .parent  {
	background:url('<?php echo plugins_url( 'images/downArrow.png', __FILE__ );?>') right 15px no-repeat transparent!important;
	width:auto;
}
.nav-menu-srm > li.minus .parent {
	background:url('<?php echo plugins_url( 'images/rArrow.png', __FILE__ );?>') right 14px no-repeat transparent!important;
}
.nav-menu-srm > li.plus .parent  {
	background:url('<?php echo plugins_url( 'images/downArrow.png', __FILE__ );?>') right 15px no-repeat transparent!important;
}
.main-navigation-srm ul.nav-menu-srm.toggled-on, .menu-toggle { display: block !important; text-align: left;}
.menu-toggle{ font-size: 12px; padding-bottom: 9px; padding-left: 15px; padding-top: 9px;margin:0; }
.main-navigation-srm .menu-toggle{
	background: <?php echo $menu_bg?>;/* MENU TITLE BG */
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
	color:<?php echo $si_sr_font_color;?>;/*MENU FONT COLOR */
	box-shadow: none;
	border:none;
}
.nav-menu-srm > li li{ 
    background-color:<?php echo $level_bg2;?>; /*LEVEL-2****/
	border-top:1px solid <?php echo $si_sr_border_color;?>;/* MENU BORDER COLOR*/ 
}
.toggled-on .nav-menu-srm li > ul{ margin-left: 0px!important; }
.toggled-on .nav-menu-srm li > ul li ul{}
.toggled-on .nav-menu-srm li > ul {position: absolute;}
.nav-menu-srm li:hover > a, .nav-menu-srm li a:hover { background: none; }
.rmm-button span { display:block;margin:4px 0px 4px 0px;height:2px;background:white;width:20px; }
.sr-menu-toggle{ cursor:pointer; }
.main-navigation-srm{ padding:0 6px; }
.rmm-toggled-controls {
	display:block;
	padding:10px;
	color:white;
	text-align:left;
	position:relative;
	background: <?php echo $menu_bg?>;/* MENU TITLE BG */
	background-repeat:repeat-x;
}
.main-navigation-srm .menu-item-has-children li.menu-item-has-children > a:after,
.main-navigation-srm .menu-item-has-children li.page_item_has_children > a:after,
.main-navigation-srm .page_item_has_children li.menu-item-has-children > a:after,
.main-navigation-srm .page_item_has_children li.page_item_has_children > a:after {
		content: "  " !important;
		right: 8px;
		top: 20px;
	}
}
</style>
<?php
}

add_action( 'wp_footer', 'build_stylesheet_url' );
add_action('wp_enqueue_scripts', 'sr_footer_js');
  
function sr_footer_js() { 
	 wp_register_script('sr-menu-script', plugins_url( 'sr-script.js', __FILE__ ),  array('jquery'), '1.0', TRUE);
	 wp_enqueue_script('sr-menu-script');
}
/* Shortcode */

// Function that will return our WordPress menu
function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'nav-menu-srmCont', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'nav-menu-srm', 
		'menu_id'         => 'nav-menu-srmID',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));

	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
function shortcodeforsrm($atts){
	
	$srm = list_menu($atts);
	$menu_title = sr_set_css('si_sr_menu_title',SR_MENU_TITLE);
	
	return $srmHtml = '<div class="main-navigation-srm">
						 <div class="rmm-toggled-controls">
							  <div class="sr-menu-toggle">'.$menu_title.'
								  <div class="srm-menu-toggle rmm-button rmm-closed" style="float:right; ">
									  <span>&nbsp;</span>
									  <span>&nbsp;</span>
									  <span>&nbsp;</span>
								  </div>
							  </div> 
						 </div>
						'.$srm.'
	                  </div>';
}
add_shortcode('srMenu', 'shortcodeforsrm');