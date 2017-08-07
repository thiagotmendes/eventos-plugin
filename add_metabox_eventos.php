<?php

add_action( 'add_meta_boxes', 'add_metabox_dados_agencia' );
function add_metabox_dados_agencia() {
  add_meta_box(
    'dados_evento', //ID
    'Dados Evento', //Título
    'mb_dados_evento_cb', //callback
    'evento', //Post Type
    'normal', //Posição
    'high' //Prioridade
  );
}
// callback que gera o metabox no posttype eventos
function mb_dados_evento_cb() {
  global $post;
  // captura os dados para o value do formulário
  $data_inicial = get_post_meta($post->ID, 'data_inicial', true);
  $data_final   = get_post_meta($post->ID, 'data_final', true);
  $hora_inicial = get_post_meta($post->ID, 'hora_inicial', true);
  $hora_final   = get_post_meta($post->ID, 'hora_final', true);
  $endereco     = get_post_meta($post->ID, 'endereco', true);
  // adc campos ao formulário
  require ('formulario_evento.php');
}
// salva os dados do evento adicionados no metabox
function save_carga_evento(){
  global $post;
  if(!empty($_POST)){
    // variaveis de captura do post
    $data_inicial = $_POST['data_inicial'];
    $data_final   = $_POST['data_final'];
    $hora_inicial = $_POST['hora_inicial'];
    $hora_final   = $_POST['hora_final'];
    $endereco     = $_POST['endereco'];
    // atualiza os dados  date('Y-m-d', strtotime($date))


    update_post_meta(  $post->ID, 'data_inicial',  $data_inicial  );
    update_post_meta(  $post->ID, 'data_final',  $data_final  );
    update_post_meta(  $post->ID, 'hora_inicial', sanitize_text_field( $hora_inicial ) );
    update_post_meta(  $post->ID, 'hora_final', sanitize_text_field( $hora_final ) );
    update_post_meta(  $post->ID, 'endereco', sanitize_text_field( $endereco ) );
  }
}
add_action('save_post', 'save_carga_evento');
