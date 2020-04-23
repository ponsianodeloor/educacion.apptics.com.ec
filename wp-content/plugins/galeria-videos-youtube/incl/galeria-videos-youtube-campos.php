<?php
function gvy_agregar_campos_metabox(){
  add_meta_box(
    'gvy_campos_video',
    __('Campos Video'),
    'gvy_campos_video_callback',
    'video',
    'normal',
    'default'
  );
}

add_action('add_meta_boxes', 'gvy_agregar_campos_metabox');


//Mostrar el contenido en Metabox
function gvy_campo_video_callback($post){
  wp_nonce_field(basename(__FILE__), 'gvy_nonce_videos');
  $gvy_video_grabar_meta = get_postmeta($post->ID);

  ?>
  <div class="envolver formulario-video">
    <div class="form-group">
      <label for="id-video"><?php esc_html('Id Video', 'gvy_domain'); ?></label>
      <input type="text" name="id_video" value="<?php if(!empty($gvy_video_grabar_meta['id_video'])) echo esc_attr($gvy_video_grabar_meta['id_video'][0]); ?>">
    </div>
    <div class="form-group">
      <label for="detalles"><?php esc_html('Detalles', 'gvy_domain'); ?></label>
      <?php
        $contenido = get_post_meta($post->ID, 'detalles', true);
        $editor = 'detalles';
        $settings = array(
          'textarea' => 5,
          'media_buttons' => false
        );
        wp_editor($contenido, $editor, $settings);
      ?>
    </div>
    <br>
    <?php if (isset($gvy_video_grabar_meta['id_video'][0])): ?>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $gvy_video_grabar_meta['id_video'][0];  ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <?php endif; ?>
  </div>
  <?php
}
//guardar campos en la base de datos
function gvy_video_guardar($post_id){
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['gvy_nonce_videos']) && wp_verify_nonce($_POST['gvy_nonce_videos'], basename(__FILE__))) ? true : false;

  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }
  if (isset($_POST['id_video'])) {
    update_post_meta($post_id, 'id_video', sanitize_text_field($_POST['id_video']));
  }
  if (isset($_POST['detalles'])) {
    update_post_meta($post_id, 'detalles', sanitize_text_field($_POST['detalles']));
  }
}//function gvy_video_guardar($post_id){

add_action('save_post', 'gvy_video_guardar')

?>
