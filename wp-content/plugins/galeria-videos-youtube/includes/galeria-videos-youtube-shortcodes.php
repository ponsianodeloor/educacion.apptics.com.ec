<?php

	//Lista de videos
	function gvy_lista_videos($atts, $contect = null){
		//declaramos variable global
		global $post;


		//Atributos del shortcode

		$atts = shortcode_atts(array(
			'title'     => 'Galería de Videos',
			'count'		=> 20,
			'category'	=> 'all'

		), $atts);

		//Verificar Categoría
		if ($atts['category'] == 'all') {
			$terminos = '';
		}else{
			$terminos = array(
				array(
					'taxonomy' => 'category',
					'field'     => 'slug',
					'terms'  => $atts['category']

			));
		}

		$args = array(
			'post_type'   		=>'video',
			'post_status' 		=> 'publish',
			'orderby'    		=> 'created',
			'order'				=> 'DESC',
			'posts_per_page'  	=> $atts['count'],
			'tax_query'			=> $terminos

		);

		//Traer videos
		$videos = new WP_Query($args);


		//chequear videos
		if ($videos->have_posts()) {
			$category = str_replace('-', ' ', $atts['category']);

			//iniciar salida
				$output = '';

			//Construir salida
			$output .= '<div class="lista-videos">';

			
			while ($videos->have_posts()) {				
				$videos->the_post();

					//Obtener valores de campos
					$id_video = get_post_meta($post->ID, 'id_video', true);
					$detalles = get_post_meta($post->ID, 'detalles', true);

					$output .= '<div class="gvy-video">';
					$output .= '<h4>'.get_the_title().'</h4>';
					$output .= '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$id_video.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
					$output .= '<div>'.$detalles.'</div>';
					$output .= '</div><br></hr>';
					
			}
				
			$output .= '</div>';	

			//Resetar post
			wp_reset_postdata();

			return $output;
		}else{
			return '<p>No se encontraron videos</p>';
		}
	}


	//agregar el shortcode
	add_shortcode('videos', 'gvy_lista_videos');