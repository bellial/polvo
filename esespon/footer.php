
    <footer class="bg-white d-flex">
      <section class="container">
        <section class="margin-logo d-flex align-items-center justify-content-between mb-4">
        <?php
          // Get the Footer page ID
          $footer_page_id = get_page_by_title('Footer')->ID;
          // Obtém a imagem destacada
          if (has_post_thumbnail($footer_page_id)) {
            $thumbnail_id = get_post_thumbnail_id($footer_page_id);
            $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
          }
        ?>
          <a href="#">
          <?php if ($thumbnail_url) : ?>
            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="Footer Image">
          <?php endif; ?>
          </a>
          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <?php
            if (have_rows('redes_sociais', $footer_page_id)) {
              while (have_rows('redes_sociais', $footer_page_id)) : the_row();
                $image = get_sub_field('icone');
                $link = get_sub_field('link');
              ?>
                <li class="ms-3">
                  <a class="text-body-secondary" href="<?php echo $link; ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo $image; ?>" alt="">
                  </a>
                </li>
              <?php
              endwhile;
              }
              ?>
          </ul>
        </section>
        <section class="copyright texto-azul d-flex justify-content-between text-center pt-3 mb-4 border-top">
          <p>Av. Brigadeiro Faria Lima – Jardim Paulistano – CEP <span class="freight-num">01452-000</span></p>
          <p>
          <?php
            printf( '&copy; <span class="freight-num">%s</span> %s', date( 'Y' ), 'Polvolab' );
          ?>

          </p>
        </section><!--copyright-->
      </section>

    </footer>
    <?php 
      wp_footer();
    ?>

  </body>
</html>
