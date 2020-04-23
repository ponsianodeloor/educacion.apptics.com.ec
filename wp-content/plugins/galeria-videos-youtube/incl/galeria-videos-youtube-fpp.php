<?php
function gvy_registrar_video(){
    $singular_name = apply_filters('gvy_label_singular', 'Video');
    $plural_name = apply_filters('gvy_label_plural', 'Videos');

    $labels = array(
      'name' => $plural_name,
      'singular_name' => $singular_name,
      'add_new' => 'Agregar Nuevo',
      'add_new_item' => 'Agregar Nuevo '.$singular_name,
      'edit' => 'Editar',
      'edit_item' => 'Editar '.$singular_name,
      'new_item' => 'Nuevo '.$singular_name,
      'view' => 'Ver',
      'view_item' => 'Ver '.$singular_name,
      'search_items' => 'Buscar '.$plural_name,
      'no_found' => 'Ningun '.$plural_name.' Encontrado',
      'no_found_in_trash' => 'Ningun '.$plural_name.' en Papelera',
      'menu_name' => $plural_name
    );

    //argumentos
    $args = apply_filters('gvy_videos_args', array(
      'labels' => $labels,
      'description' => 'Videos por categoria',
      'taxonomies' => array('Category'),
      'public' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-video-alt',
      'show_in_nav_menus' => true,
      'capability_type' => 'post',
      'supports' => array('title')
    ));

    //registrar el tipo de pos
    register_post_type('video', $args);

}

//agregar action
add_action('init', 'gvy_registrar_video')
?>
