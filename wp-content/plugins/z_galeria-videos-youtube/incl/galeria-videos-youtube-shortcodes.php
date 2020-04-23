<?php
 //lista de videos
 function gvy_lista_videos($atts, $content = null){
  //declaramos la variable global
  $global = $post;

  //atributos de shortcode
  $atts = shortcode_atts(array(
   'title' => 'Galeria de Videos',
   'count' => '10',
   'category' => 'all'
  ), $atts);

  //verificar categoria
  if ($atts['category'] == 'all') {
   $terminos = '';
  }else{
   $terminos = array(
    array(
     'taxonomy' => 'category',
     'fiel' => 'slug',
     'terms' => $atts['category']
    ));
  }//else

  $args = array(
   'post_type' => 'video',
   'post_status' => 'publish',
   'order_by' => 'created',
   'order' => 'DESC',
   'post_per_page' => $atts['count'],
   'tax_query' => $terminos
  );

  //traer los videos
  $videos = new WP_Query($args);

  if ($videos->have_post()) {
   $category = str_replace('-', ' ', $atts['category']);
   $output = '';
   //construir la salida
   $output .= '<div class="lista-videos>"';

   while ($videos->have_post) {
    $videos->the_post();
    //obtener valores de campos
    $id_video = get_post_meta($post->ID, 'id_video', true);
    $detalles = get_post_meta($post->ID, 'detalles', true);

    $output .= '<div class="gvy_video">';
    $output .= '<h4>'.get_the_title().'</h4>';
    $output .= '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$id_video.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    $output .= '<div>'.$detalles.'</div>';
    $output .= '</div><br><hr>';
   }

   $output.='</div>';
   //resetear el post
   wp_reset_post_data();
   return $output;

  }else {
  return '<p>No se encontraron videos<p>';
 }
}

//agregar el shortcode
add_shortcode('videos', 'gvy_lista_videos');
?>
