<?php
/*
Plugin Name: Super Contact Form
Plugin URI: http://www.detoxdietabc.com/
Version: 3.1
Author: <a href="http://www.detoxdietabc.com">Detox Diet</a>
Description: A Super Contact form plugin.
*/

function add_scf_style()
{
  echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/super-contact-form/scf-style.css" />' . "\n";
}

function addSCF($content)
{
  if(false !== strpos($content, '[scf]'))
  {
    include('contact-form.php');
  }
  else
  {
    return $content;
  }
}

function scf_options()
{
	include('scf-options.php');
}

function scf_settings()
{
  add_options_page('Super Contact Form Options', 'Super Contact Form', 8, __FILE__, 'scf_options');
}
add_action('wp_head','add_scf_style');
add_action('admin_menu', 'scf_settings');
add_filter('the_content','addSCF');
?>