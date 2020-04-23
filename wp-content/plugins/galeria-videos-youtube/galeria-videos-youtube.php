<?php

/*
Plugin Name:  Galería de Videos Youtube
Plugin URI:   http://render2web.com
Description:  Plugin para crear una galería de videos de youtube
Version:      1.0
Author:       render2web
Author URI:   http://render2web.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  render2web.com

*/


//Si se accede directamente se sale
if (!defined('ABSPATH')) {
	exit;
}


//Cargar scripts
require_once(plugin_dir_path(__FILE__) . '/includes/galeria-videos-youtube-scripts.php');

//Cargar shortcodes
require_once(plugin_dir_path(__FILE__) . 'includes/galeria-videos-youtube-shortcodes.php');

if (is_admin()) {
	//Cargar shortcodes
require_once(plugin_dir_path(__FILE__) . 'includes/galeria-videos-youtube-fpp.php');


//Cargar shortcodes
require_once(plugin_dir_path(__FILE__) . 'includes/galeria-videos-youtube-campos.php');
}

