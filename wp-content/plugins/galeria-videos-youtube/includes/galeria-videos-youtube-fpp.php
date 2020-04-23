<?php

//Crear formato de post personalizado

function gvy_registrar_video(){
	$singular_name = apply_filters('gvy_label_singular', 'Video');
	$plural_name = apply_filters('gvy_label_plural', 'Videos');


	$labels = array(
		'name'                 => $plural_name,
		'singular_name'        => $singular_name,
		'add_new'              => 'Agregar Nuevo',
		'add_new_item'	       => 'Agregar Nuevo '.$singular_name,
		'edit'                 => 'Editar',
		'edit_item'            => 'Editar'.$singular_name,
		'new_item'             => 'Nuevo '.$singular_name,
		'view'                 => 'Ver',
		'view_item'            => 'Ver '.$singular_name,
		'search_items'         => 'Buscar '.$plural_name,
		'not_found'            => 'Ningún '.$plural_name. ' Encontrado',
		'not_found_in_trash'   => 'Ningún '.$plural_name.' Encontrado',
		'menu_name'            => $plural_name

	);

	$args = apply_filters('gvy_video_args', array(
		'labels'               => $labels,
		'description'          => 'Videos por categoría',
		'taxonomies'           => array('category'),
		'public'	           => true,
		'show_in_menu'         => true,
		'menu_position'        => 5,
		'menu_icon'            => 'dashicons-video-alt',
		'show_in_nav_menus'    => true,
		'capability_type'      => 'post',
		'supports'             => array('title')
	));

	//Registrar tipo de post
	register_post_type('video', $args);
}


//Agregar action, necesario para ejecutar-
add_action('init', 'gvy_registrar_video');


