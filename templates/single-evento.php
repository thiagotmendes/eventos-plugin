<?php get_header() ?>
  <section>
    <div class="container">
      <?php if (have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
          <?php
          $dataInicial  = get_field('data_inicial');
          $dataFinal    = get_field('data_final');
          $hora_inicial = get_field('hora_inicial');
          $hora_final   = get_field('hora_final');
          $endereco     = get_field('endereco');
          ?>
          <?php get_template_part( 'inc/views/header-page' ); ?>
          <p class="date pull-left" style="padding-right:10px;">
            <?php if (!empty($dataInicial)): ?>
              <i class="clr-preto icon-calendar fs-12"></i> <strong>de</strong> <?php echo $dataInicial ?>
              <?php if (!empty($dataFinal)): ?>
                <strong>a</strong> <?php echo $dataFinal ?>
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
          <div class="clearfix"></div>
          <?php if (!empty($endereco)): ?>
            <p class="location"><i class="clr-preto icon-pin fs-12"></i> <?php echo $endereco ?></p>
          <?php endif; ?>
          <?php the_content() ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>
<?php get_footer() ?>
