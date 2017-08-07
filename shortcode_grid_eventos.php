<?php
  function registra_shortcode_grid_evento($atts){
    $dataAtual = date('d/m/Y');
  ?>
  <div class="row">
    <?php
      $argEventosHome = array(
        'post_type'       => 'evento',
        'posts_per_page'  => $atts['post'],
        'meta_key'        => 'data_inicial',
        'meta_type'        => 'DATE',
        'date_format'     => '%d/%m/%Y',
        'orderby'         => 'meta_value',
        'order'           => 'asc'
      );

      $eventosHome = new wp_query($argEventosHome);
      if($eventosHome->have_posts()){
        // loop eventos da home
        while($eventosHome->have_posts()){ $eventosHome->the_post();
          $dataInicial  = explode("/", get_field('data_inicial'));
          $dataFinal    = explode("/", get_field('data_final'));
          $hora_inicial = get_field('hora_inicial');
          $hora_final   = get_field('hora_final');
          $endereco     = get_field('endereco');

          ?>
          <div class="col-xs-24 col-sm-12">
            <div class="item mb-24">
              <a href="#">
                <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive center-block animate' ) ); ?>
              </a>
              <div class="info">
                <h2> <?php the_title() ?> </h2>
                <?php echo get_field('data_inicial') ?>
                <!--
                <p class="date pull-left" style="padding-right:10px;">
                  <?php if (!empty($dataInicial)): ?>
                    <i class="clr-preto icon-calendar fs-12"></i> <strong>de</strong> <?php echo $dataInicial[0]."/".$dataInicial[1] ?>
                    <?php if (!empty($dataFinal)): ?>
                      <strong>a</strong> <?php echo $dataFinal[0]."/".$dataFinal[1] ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </p>
                <p class="time pull-left">
                  <?php if (!empty($hora_inicial)): ?>
                    <i class="clr-preto icon-clock fs-12"></i> <?php echo $hora_inicial ?>
                    <?php if (!empty($hora_final)): ?>
                      <strong>ás</strong> <?php echo $hora_final ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </p>
              -->
                <div class="clearfix"></div>
                <?php if (!empty($endereco)): ?>
                  <p class="location"><i class="clr-preto icon-pin fs-12"></i> <?php echo $endereco ?></p>
                <?php endif; ?>

                <span class="description">
                  <?php the_excerpt_limit(20) ?>
                </span>
              </div>
            </div>
          </div>
          <?php
        }
        // final do loop
      }
     ?>
  </div>
  <?php
  }
  add_shortcode('eventos_home','registra_shortcode_grid_evento');
