<?php
/*
Plugin Name: Eventos
Plugin URI: http://thiagotmendes.com.br/
Description: Plugins de eventos
Version: 0.1
Author: Thiago Mendes
Author URI: http://thiagotmendes.com.br/
*/

/**
 * Copyright (c) `date "+%Y"` . All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

define('WP_V_REQUISITO', '3.0.0');

// registra funções javaScript para o funcionamento do plugin
add_action( 'admin_enqueue_scripts', 'assets_plugin' );
function assets_plugin(){
  wp_enqueue_script('jquery-ui-datepicker');
  wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
  wp_enqueue_style('jquery-ui');

  wp_enqueue_script( 'maskedinput', plugin_dir_url( __FILE__ ) .'/js/masked.jquery.js', array(),'1.4.1' );
  wp_enqueue_script( 'funcoes-plugin', plugin_dir_url( __FILE__ ) .'/js/funcoes.js', array(),'1.0.0' );

}

// gera a pagina single do Custom post type sem precisar crialo dentro do template
add_filter( 'single_template', 'single_event' );
function single_event( $single )
{
  global $wp_query, $post;
  // captura o caminho do arquivo na pasta do tema
  $templateDir = get_template_directory() ."/single-evento.php";
  // verifica o post type
  if ( $post->post_type == 'evento' ) {
    // verifica se existe um arquivo single para o post type na pasta do template
    if (!file_exists($templateDir)) {
      $single = dirname( __FILE__ ) . '/templates/single-evento.php';
    } else {
      $single = $templateDir;
    }
  }
  return $single;
}

/* ----------------------------------------------------- */
/* Resumo com limite de palavras customizada */
/* ----------------------------------------------------- */
function the_excerpt_limit($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
        $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        echo $excerpt;
}

// cria o ctp
require ('add_custom_post_type.php');
// cria os campos para definição de data eventos
require ('add_metabox_eventos.php');
// cria os shortcode
require ('shortcode_grid_eventos.php');
