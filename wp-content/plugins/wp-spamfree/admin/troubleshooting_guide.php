<h2>Troubleshooting Guide / Support</h2>
<a name="wpsf_troubleshooting" class="anchor">Troubleshooting Guide / Support</a>

<p>If you're having trouble getting things to work after installing the plugin, here are a few things to check:</p>
<ol style="list-style-type:decimal;padding-left:30px;">
    <li>Check the <a href="https://www.polepositionmarketing.com/digital-marketing-learning-library/wordpress-plugins/wpspam-free/" target="_blank">FAQ's</a>.<br />&nbsp;</li>
    <li>If you haven't yet, please upgrade to the latest version.<br />&nbsp;</li>
    <li>Check to make sure the plugin is installed properly. Many support requests for this plugin originate from improper installation and can be easily prevented. To check proper installation status, go to the WP-SpamFree page in your Admin. It's a submenu link on the Plugins page. Go the the 'Installation Status' area near the top and it will tell you if the plugin is installed correctly. If it tells you that the plugin is not installed correctly, please double-check what directory you have installed WP-SpamFree in, delete any WP-SpamFree files you have uploaded to your server, re-read the Installation Instructions, and start the Installation process over from step 1.<br />&nbsp;<br /><strong>Currently your plugin is: <a title="<?php _e('Click to visit the PluginBuddy Knowledge Base', 'it-l10n-backupbuddy');?>" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/wordpress-plugins/wpspam-free/" style="text-decoration: none; color: #000000;"><strong><?php echo "<img src='http://www.clker.com/cliparts/1/f/c/1/12379140591570510706dholler_ok.svg.thumb.png' alt='' width='24' height='24' style='border-style:none;vertical-align:middle;' /> Installation Status: <span style='color:".$wp_installation_status_color.";'>".$wp_installation_status_msg_main."</span>"; ?></strong></a></strong><br />&nbsp;</li>
    <li>Clear your browser's cache, clear your cookies, and restart your browser. Then reload the page.<br />&nbsp;</li>
    <li>If you are receiving the error message: "Sorry, there was an error. Please enable JavaScript and Cookies in your browser and try again." then you need to make sure <em>JavaScript</em> and <em>cookies</em> are enabled in your browser. (JavaScript is different from Java. Java is not required.) These are enabled by default in web browsers. The status display will let you know if these are turned on or off (as best the page can detect - occasionally the detection does not work.) If this message comes up consistently even after JavaScript and cookies are enabled, then there most likely is an installation problem, plugin conflict, or JavaScript conflict. Read on for possible solutions.<br />&nbsp;</li>
    <li>If you have multiple domains that resolve to the same server, or are parked on the same hosting account, make sure the domain set in the WordPress configuration options matches the domain where you are accessing the blog from. In other words, if you have people going to your blog using http://www.yourdomain.com/ and the WordPress configuration has: http://www.yourdomain2.com/ you will have a problem (not just with this plugin, but with a lot of things.)<br />&nbsp;</li>
    <li>Check your WordPress Version. If you are using a release earlier than 2.3, you may want to upgrade for a whole slew of reasons, including features and security.<br />&nbsp;</li>
    <li>Check the options you have selected to make sure they are not disabling a feature you want to use.<br />&nbsp;</li>
    <li>Make sure that you are not using other front-end anti-spam plugins (CAPTCHA's, challenge questions, etc) since there's no longer a need for them, and these could likely conflict. (Back-end anti-spam plugins like Akismet are fine, although unnecessary.)<br />
      <br />
  <strong>Second, check for a 403 Forbidden error.</strong> That means there is a problem with your file permissions. If the files in the wp-spamfree folder don't have standard permissions (at least 644 or higher) they won't work. This usually only happens by manual modification, but strange things do happen. <strong>The <em>AskApache Password Protect Plugin</em> is known to cause this error.</strong> Users have reported that using its feature to protect the /wp-content/ directory creates an .htaccess file in that directory that creates improper permissions and conflicts with WP-SpamFree (and most likely other plugins as well). You'll need to disable this feature, or disable the <em>AskApache Password Protect Plugin</em> and delete any .htaccess files it has created in your /wp-content/ directory before using WP-SpamFree.<br />
  &nbsp;</li>
  <li>Check for conflicts with other JavaScripts installed on your site. This usually occurs with with JavaScripts unrelated to WordPress or plugins. However some themes contain JavaScripts that aren't compatible. (And some don't have the call to the <code>wp_head()</code> function which is also a problem. Read on to see how to test/fix this issue.) If in doubt, try switching themes. If that fixes it, then you know the theme was at fault. If you discover a conflicting theme, please let us know.<br />&nbsp;</li>
<li>Check for conflicts with other WordPress plugins installed on your blog. Although errors don't occur often, this is one of the most common causes of the errors that do occur. I can't guarantee how well-written other plugins will be. First, see the <a href="#wpsf_known_conflicts">Known Plugin Conflicts</a> list. If you've disabled any plugins on that list and still have a problem, then proceed. <br />&nbsp;<br />To start testing for conflicts, temporarily deactivate all other plugins except WP-SpamFree. Then check to see if WP-SpamFree works by itself. (For best results make sure you are logged out and clear your cookies. Alternatively you can use another browser for testing.) If WP-SpamFree allows you to post a comment with no errors, then you know there is a plugin conflict. The next step is to activate each plugin, one at a time, log out, and try to post a comment. Then log in, deactivate that plugin, and repeat with the next plugin. (If possible, use a second browser to make it easier. Then you don't have to keep logging in and out with the first browser.) Be sure to clear cookies between attempts (before loading the page you want to comment on). If you do identify a plugin that conflicts, please let me know so I can work on bridging the compatibility issues.<br />&nbsp;</li>
<li>Make sure the theme you are using has the call to <code>wp_head()</code> (which most properly coded themes do) usually found in the <code>header.php</code> file. It will be located somewhere before the <code>&lt;/head&gt;</code> tag. If not, you can insert it before the <code>&lt;/head&gt;</code> tag and save the file. If you've never edited a theme before, proceed at your own risk: <br />&nbsp;
<ol style="list-style-type:decimal;padding-left:30px;">
    <li>In the WordPress admin, go to <em>Themes (Appearance) - Theme Editor</em><br />&nbsp;</li>
    <li>Click on Header (or <code>header.php</code>)<br />&nbsp;</li>
    <li>Locate the line with <code>&lt;/head&gt;</code> and insert <code>&lt;?php wp_head(); ?&gt;</code> before it.<br />&nbsp;</li>
    <li>Click 'Save'<br/>&nbsp;</li>
</ol>
</li>
<li>On the WP-SpamFree Options page in the WordPress Admin, under <a href="#wpsf_general_options">General Options</a>, check the option "M2 - Use two methods to set cookies." and see if this helps.<br />&nbsp;</li>
<li>If have checked all of these, and still can't quite get it working, please submit a support request at the <a href="https://www.polepositionmarketing.com/digital-marketing-learning-library/wordpress-plugins/wpspam-free/" target="_blank" rel="external" >WP-SpamFree Support Page</a>.</li>
</ol>

<p><div style="text-align:right;font-size:12px;">[ <a href="#wpsf_top">BACK TO TOP</a> ]</div></p>