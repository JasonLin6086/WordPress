<?php
/*
Plugin Name: WP-CopyProtect [Protect your blog posts]
Plugin URI: http://chetangole.com/blog/wp-copyprotect/
Description: This plug-in will protect your blog content [posts] from being copied. A simple plug-in developed to stop the Copy cats.
Version: 3.1.0
Author: Chetan Gole
Author URI: http://chetangole.com/
*/

/*
Copyright (C) 2015  Chetan Gole - chetangole.com

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// No right click (with message) - Problem for copy cats NO RIGHT CLICK
function CopyProtect_no_right_click($CopyProtect_click_message)
{
?>
<script type="text/javascript">
<!--
/******************************************************************************
***   COPY PROTECTED BY http://chetangole.com/blog/wp-copyprotect/   version 3.1.0 ****
******************************************************************************/
var message="<?php echo $CopyProtect_click_message; ?>";
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("alert(message);return false")
// --> 
</script>

<?php
}
// No right click (without message) - Problem for copy cats NO RIGHT CLICK
function CopyProtect_no_right_click_without_message()
{
?>
<script type="text/javascript">
<!--
/******************************************************************************
***   COPY PROTECTED BY http://chetangole.com/blog/wp-copyprotect/   version 3.1.0 ****
******************************************************************************/
function clickIE4(){
if (event.button==2){
return false;
}
}
function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("return false")
// --> 
</script>

<?php
}
// No selection header - Now your content is protected from copy and paste guys
function CopyProtect_no_select()
{
?>
<script type="text/javascript">
/******************************************************************************
***   COPY PROTECTED BY http://chetangole.com/blog/wp-copyprotect/   version 3.1.0 ****
******************************************************************************/
function disableSelection(target){
if (typeof target.onselectstart!="undefined") //For IE 
	target.onselectstart=function(){return false}
else if (typeof target.style.MozUserSelect!="undefined") //For Firefox
	target.style.MozUserSelect="none"
else //All other route (For Opera)
	target.onmousedown=function(){return false}
target.style.cursor = "default"
}
</script>
<?php
}
// No selection footer 
function CopyProtect_no_select_footer()
{
?>
<script type="text/javascript">
disableSelection(document.body)
</script>
<?php
}
function CopyProtectCredit()
{
?>
<small>Copy Protected by <a href="http://chetangole.com/" target="_blank">Chetan</a>'s <a href="http://chetangole.com/blog/wp-copyprotect/" target="_blank">WP-Copyprotect</a>.</small>
<?php
}
// Tuning your WP-CopyProtect - The settings page
function CopyProtect_options_page()
{
?>
<div class="wrap"><br/>
	<h1>WP Copy Protect <font size="2">v3.0.0</font></h1>
	| <a href="http://chetangole.com/blog/wp-copyprotect/" target="_blank" title="Visit homepage of wordpress plugin WP-CopyProtect"> Visit Plugin page </a> | <a href="http://chetangole.com/blog/wp-copyprotect/#donate" target="_blank" title="Donate some amount to WP-CopyProtect plugin developer to help him to develop more such plugins"> Donate </a> | <a href="http://chetangole.com/blog/wp-copyprotect/#donors" target="_blank" title="Few power donors,special thanks to them"> Power Donors </a> | <br/><br/>
<?php
	if($_POST['CopyProtect_save']){
		update_option('CopyProtect_nrc',$_POST['CopyProtect_nrc']);
		update_option('CopyProtect_nts',$_POST['CopyProtect_nts']);
		update_option('CopyProtect_nrc_text', sanitize_text_field($_POST['CopyProtect_nrc_text']));
		update_option('CopyProtect_credit',$_POST['CopyProtect_credit']);
		update_option('CopyProtect_user_setting',$_POST['CopyProtect_user_setting']);

		echo '<div class="updated"><p>Settings saved, Please clear/update cache if you are using any cache plugin</p></div>';
	}
	$wp_CopyProtect_nrc = get_option('CopyProtect_nrc');
	$wp_CopyProtect_nts = get_option('CopyProtect_nts');
	$wp_CopyProtect_credit = get_option('CopyProtect_credit');
	$wp_CopyProtect_user_setting = get_option('CopyProtect_user_setting');
	?>
	<form method="post" id="CopyProtect_options">
		<fieldset class="options">
		<table class="form-table">		
			<tr valign="top"> 
				<th width="33%" scope="row">Disable right mouse click:</th> 
				<td>
				<input type="radio" name="CopyProtect_nrc" value="0" <?php if($wp_CopyProtect_nrc == 0) echo('checked'); ?> />
				Do not disable right click.<br />
				<input type="radio" name="CopyProtect_nrc" value="1" <?php if($wp_CopyProtect_nrc == 1) echo('checked'); ?> />
				Disable right click and do no show any message.<br />
				<input type="radio" name="CopyProtect_nrc" value="2" <?php if($wp_CopyProtect_nrc == 2) echo('checked'); ?> />
				Disable right click and show message :
				<input name="CopyProtect_nrc_text" type="text" id="CopyProtect_nrc_text" value="<?php echo get_option('CopyProtect_nrc_text') ;?>" size="30"/>
				</td> 
			</tr> 
			<tr valign="top"> 
				<th width="33%" scope="row">Disable text selection:</th> 
				<td>
				<input type="checkbox" id="CopyProtect_nts" name="CopyProtect_nts" value="CopyProtect_nts" <?php if($wp_CopyProtect_nts == true) { echo('checked="checked"'); } ?> />
				Activate. <a href="http://chetangole.com/blog/wp-copyprotect/#kp" target="_blank">Not working ?</a>
				</td> 
			</tr>	
			<tr valign="top"> 
				<th width="33%" scope="row">Display protection information:</th> 
				<td>
				<input type="checkbox" id="CopyProtect_credit" name="CopyProtect_credit" value="CopyProtect_credit" <?php if($wp_CopyProtect_credit == true) { echo('checked="checked"'); } ?> />
				Activate.
				</td> 
			</tr>	
			<tr valign="top"> 
				<th width="33%" scope="row">User Setting:</th> 
				<td>
				<input type="radio" name="CopyProtect_user_setting" value="0" <?php if($wp_CopyProtect_user_setting == 0) echo('checked'); ?> />
				Exclude admin users.<br />
				<input type="radio" name="CopyProtect_user_setting" value="1" <?php if($wp_CopyProtect_user_setting == 1) echo('checked'); ?> />
				Exclude all logged-in users.<br />
				<input type="radio" name="CopyProtect_user_setting" value="2" <?php if($wp_CopyProtect_user_setting == 2) echo('checked'); ?> />
				Apply settings to all users.
				</td> 
			</tr> 			
		<tr>
        <th width="33%" scope="row">Save settings :</th> 
        <td>
		<input type="submit" name="CopyProtect_save" value="Save Settings" />
        </td>
        </tr>
		<tr>
        <th scope="row" style="text-align:right; vertical-align:top;">
        <td>
		<h3>Whats next ?</h3>
		<p>Why dont you <a href="/wp-admin/post-new.php">write a post</a> about <a href="http://chetangole.com/blog/wp-copyprotect/" target="_blank">WP-CopyProtect</a> ?</p>
		<h3>Problems, Questions, Suggestions ?</h3>
		<p>Send me an e-mail via: <a href="http://chetangole.com/blog/contact/" target="_blank">contact page</a></p>
		<h3>Thank you</h3>
		<p>Plug-in developed by <a href="http://chetangole.com/" target="_blank">Chetan Gole</a>.</p>
        </td>
        </tr>
		</table>
		</fieldset>
	</form>
	</table>
	</div>
	<?php
}

//call to function
function CopyProtect()
{
	$wp_CopyProtect_nrc = get_option('CopyProtect_nrc');
	$wp_CopyProtect_nts = get_option('CopyProtect_nts');
	$wp_CopyProtect_nrc_text = get_option('CopyProtect_nrc_text');
	$wp_CopyProtect_credit = get_option('CopyProtect_credit');
	$pos = strpos(strtolower(getenv("REQUEST_URI")), '?preview=true');
	
	if ($pos === false && ToApplySettings()) {
		if($wp_CopyProtect_nrc == 1) { CopyProtect_no_right_click_without_message(); }
		if($wp_CopyProtect_nrc == 2) { CopyProtect_no_right_click($wp_CopyProtect_nrc_text); }
		if($wp_CopyProtect_nts == true) { CopyProtect_no_select(); }
	}
}

function ToApplySettings(){
	$wp_CopyProtect_user_setting = get_option('CopyProtect_user_setting');
	
	if($wp_CopyProtect_user_setting == 0 && current_user_can('level_10'))
	{
		return false;
	}else if ($wp_CopyProtect_user_setting == 1 && is_user_logged_in()) {
		return false;
	}else if ($wp_CopyProtect_user_setting == 2) {
		return true;
	}else{
		return true;
	}
}

function CopyProtect_footer()
{
	$wp_CopyProtect_nts = get_option('CopyProtect_nts');
	$wp_CopyProtect_credit = get_option('CopyProtect_credit');

	if(ToApplySettings()){
		if($wp_CopyProtect_nts == true) { CopyProtect_no_select_footer(); }
		if($wp_CopyProtect_credit == true) { CopyProtectCredit(); }
	}
}

function CopyProtect_adminmenu()
{
	if (function_exists('add_options_page')) {	
		add_options_page('WP-CopyProtect', 'WP-CopyProtect', 9, basename(__FILE__),'CopyProtect_options_page');
	}
}

//Commanding the Wordpress
add_action('wp_head','CopyProtect');
add_action('wp_footer','CopyProtect_footer');

add_action( 'admin_menu', 'register_wp_copyprotect_menu' );

function register_wp_copyprotect_menu(){
    add_menu_page( 'WP Copy Protect', 'WP Copy Protect', 'manage_options', 'wpcopyprotect', 'CopyProtect_options_page', '', '2.5467' ); 
}

?>