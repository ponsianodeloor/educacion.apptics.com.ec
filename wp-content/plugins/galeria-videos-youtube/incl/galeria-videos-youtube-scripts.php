//validar si esta en la administracion
<?php

if (is_admin()) {
 //agregar script de la administracion
 function gvy_agregar_scripts_admin(){
  wp_enqueue_style('gvy-main-admin-style', plugins_url() . '/galeria-videos-youtube/css/estilos-admin.css');
  wp_enqueue_style('gvy-main-script', plugins_url() . '/galeria-videos-youtube/css/estilos-admin.css');
 }
 add_action('admin_init', 'gvy_agregar_scripts_admin');
}
//agregar scripts para el frontend
function gvy_agregar_scripts(){
 wp_enqueue_style('gvy-main-admin-style', plugins_url() . '/galeria-videos-youtube/css/estilos.css');
 wp_enqueue_style('gvy-main-script', plugins_url() . '/galeria-videos-youtube/css/estilos-admin.css');
}
add_action('admin_init', 'gvy_agregar_scripts');

?>
