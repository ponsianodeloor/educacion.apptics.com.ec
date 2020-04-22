<?php
/*
Plugin Name: Galeria de Videos Youtube
Plugin URI: https://apptics.com.ec.org/plugins/galeria-videos-youtube/
Description: Plugin para crear videos en youtube
Version: 1.0
Author: ponsianodeloor
Author URI: http://ponsianodeloor.apptics.com.ec
Domain Path: /languages
Licence: GLP2
*/


// si se accede directamente
if (!defined('ABSPATH')) {
 exit;
}

//cargar scripts
require_once(plugin_dir_path(__FILE__) . '/incl/galeria-videos-youtube-scripts.php');

//cargar shortcodes
require_once(plugin_dir_path(__FILE__) . '/incl/galeria-videos-youtube-shorcodes.php');

if (is_admin()) {
 //cargar fpp
 require_once(plugin_dir_path(__FILE__) . '/incl/galeria-videos-youtube-fpp.php');
 //cargar campos
 require_once(plugin_dir_path(__FILE__) . '/incl/galeria-videos-youtube-campos.php');
}
?>
