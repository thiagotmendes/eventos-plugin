<?php
/* cira o cpt para multimidia */
add_action('init', 'create_post_eventos' );
function create_post_eventos() {
  register_post_type('evento',
    array(
      'labels' => array(
          'name' => __( 'Eventos', 'portal' ),
          'singular_name' => __( 'evento', 'portal' )
      ),
      'public' => true,
      'menu_icon' => 'dashicons-calendar-alt',
      'has_archive' => 'eventos',
      'rewrite' => array('slug' => 'evento'),
      'supports' => array(
          'title',
          'excerpt',
          'editor',
          'revisions',
          'thumbnail'
      )
    )
  );

  register_taxonomy(
    'categoria-evento',
    'evento',
    array(
        'label' => __( 'Categoria evento', 'portal' ),
        'rewrite' => array( 'slug' => 'categoria-evento' ),
        'hierarchical' => true
    )
  );
}
