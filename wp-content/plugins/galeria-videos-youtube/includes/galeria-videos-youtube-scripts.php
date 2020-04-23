<?php

//Validar si esta en la administracion y agregar los scripts
if (is_admin()) {
	//agregar script de la administración
	function gvy_agregar_scripts_admin(){
		wp_enqueue_style('gvy-main-admin-style', plugins_url() . '/galeria-videos-youtube/css/estilos-admin.css');
		wp_enqueue_script('gvy-main-script', plugins_url() . '/galeria-videos-youtube/js/main.js', array('jquery'));
	}

	add_action('admin_init', 'gvy_agregar_scripts_admin');
}

//agregar scripts
	function gvy_agregar_scripts(){
		wp_enqueue_style('gvy-main-style', plugins_url() . '/galeria-videos-youtube/css/estilos.css');
		wp_enqueue_script('gvy-main-script', plugins_url() . '/galeria-videos-youtube/js/main.js', array('jquery'));
	}
	
	add_action('wp_enqueue_scripts', 'gvy_agregar_scripts');