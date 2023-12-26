<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package polvolab
 */

get_header(); 
?>
<main class="z-1 cinzinha">
    <section id="bannerSection" class="text-white vw-100 clickable-section desktop-banner-section">
      <?php
      // Get the ID of the "Home" page
      $home_page_id = get_option('page_on_front');
      $featured_image_url = get_the_post_thumbnail_url($home_page_id);
      $mobile_banners = get_field('mobile_banners', $home_page_id); // Repeater field for mobile banners
      ?>
      <img id="bannerImage" class="img-fluid position-absolute top-0 start-0 vw-100 z-n1" src="wp-content/themes/esespon/assets/images/POLVOLAB_Banner_Home_1_jul23.png" alt="Oportunidade e conexão para mudar o mundo.">
      
      <section class="container">
        <section class="main-text">
          <?php
            // Fetch the content from the post content field
            $home_content = get_post_field('post_content', $home_page_id);
            // Fetch the content from the ACF WYSIWYG field
            $home_section_one = get_field('home_section_one', $home_page_id);


            echo apply_filters('the_content', $home_content);
          ?>
        </section>
      </section>
    </section>

    <?php if ($mobile_banners && isset($mobile_banners[0])) : ?>
  <section class="text-white vw-100 clickable-section mobile-banner-section">
    <img class="img-fluid position-absolute top-0 start-0 vw-100 z-n1 bannerImageMobile" src="<?php echo esc_url($mobile_banners[0]['image']); ?>" alt="Mobile Banner Image" data-second-image="<?php echo esc_url($mobile_banners[1]['image']); ?>">
    
    <section class="container-lg">
      <section class="main-text">
        <?php echo apply_filters('the_content', $home_content); ?>
      </section>
    </section>
  </section>
<?php endif; ?>


    <section class="d-flex flex-column align-items-center blue-cards cinzinha azul-padrao position-relative">
      <section class="blue-vector position-absolute top-50 start-50 translate-middle vw-100">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1280 162" fill="none">
          <path d="M1329.17 1.04527C1245.93 79.1268 1116.94 93.1154 1006.9 61.9693C969.125 51.2841 932.099 35.7824 892.878 33.7463C823.169 30.1458 759.584 68.9635 696.278 98.2064C550.033 165.779 375.341 185.028 227.372 121.169C184.36 102.61 144.376 77.5145 101.065 59.698C8.39666 21.5638 -98.4547 18.836 -192.941 52.1888" stroke="black" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1280 158" fill="none">
          <g filter="url(#filter0_d_624_26696)">
            <path d="M1356.23 49.622C1283.62 90.6223 1168.72 97.0854 1069.74 79.6228C1035.76 73.6318 1002.35 65.0777 967.272 63.6884C904.929 61.229 848.995 81.4403 793.098 96.5471C663.969 131.455 508.362 140.37 374.786 105.167C335.957 94.9363 299.689 81.2427 260.61 71.4055C176.997 50.3502 81.4984 48.069 -2.15774 65.1266" stroke="black" stroke-width="2" stroke-miterlimit="10" shape-rendering="crispEdges"/>
          </g>
          <defs>
            <filter id="filter0_d_624_26696" x="-56.3574" y="-1.24878" width="1467.08" height="187.804" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
              <feFlood flood-opacity="0" result="BackgroundImageFix"/>
              <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
              <feOffset dy="4"/>
              <feGaussianBlur stdDeviation="27"/>
              <feComposite in2="hardAlpha" operator="out"/>
              <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 1 0"/>
              <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_624_26696"/>
              <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_624_26696" result="shape"/>
            </filter>
          </defs>
        </svg>
      </section>
        <?php echo apply_filters('the_content', $home_section_one); ?>
      <section class="container container-cards cards-desk">
        <div class="row g-3 py-5 row-cols-2 justify-content-center cards-row">
        <?php
              // Check if the repeater field has rows
              if (have_rows('home_cards', $home_page_id)) {
                  // Loop through the rows of the repeater field
                  while (have_rows('home_cards')) : the_row();
                      // Get subfield values
                      $title = get_sub_field('title');
                      $text = get_sub_field('text');
                      $image = get_sub_field('image');
                      // Get subfield wrapper attributes
                      $image_wrapper = get_sub_field_object('image')['wrapper'];
                      $image_class = isset($image_wrapper['class']) ? esc_attr($image_wrapper['class']) : '';
        ?>
          <div class="col d-flex align-items-start border rounded-blue cinzinha position-relative me-3">
            <div class="cards-images z-2">
            <img class="position-absolute top-50 translate-middle <?php echo $image_class; ?>" src="<?php echo $image; ?>" alt="">
            </div>
            <section class="blue-text">
              <h2><?php echo $title; ?></h2>
              <p><?php echo nl2br(esc_html($text)); ?></p>
              </section>
          </div>
          <?php
            endwhile;
            } else {
                // No rows found
                echo 'No cards found.';
            }
          ?>
        </div>
      </section>

      <section class="container container-cards cards-mobile">
        <div class="cards-row mobile-slick">
          <?php
          // Check if the "home_cards" repeater field has rows
          if (have_rows('home_cards', $home_page_id)) {
            // Loop through the rows of the "home_cards" repeater field
            while (have_rows('home_cards')) : the_row();
              // Get subfield values
              $title = get_sub_field('title');
              $text = get_sub_field('text');
              
              // Check if the "mobile_atuacao_cards" repeater field has rows
              if (have_rows('mobile_atuacao_cards', $home_page_id)) {
                // Loop through the rows of the "mobile_atuacao_cards" repeater field
                while (have_rows('mobile_atuacao_cards')) : the_row();
                  // Get subfield value (image) for the current row
                  $image = get_sub_field('image');
                  
                  // Display the first image from the repeater
                  break; // Exit the loop after the first image is displayed
                endwhile;
              }
              ?>
              <div class="border rounded-blue cinzinha position-relative">
                <img class="position-absolute" src="<?php echo $image; ?>" alt="">
                <section class="blue-text">
                  <h2><?php echo $title; ?></h2>
                  <p class="text-start"><?php echo nl2br(esc_html($text)); ?></p>
                </section>
              </div>
              <?php
            endwhile;
          } else {
            // No rows found
            echo 'No cards found.';
          }
          ?>
        </div>
      </section>



    </section>
    
    <section class="mel-mesmo position-relative row row-cols-lg-2 align-items-start d-flex">
      <section class="col mel-img-wrapper">
        <img class="mel-img z-2 img-fluid" src="wp-content/themes/esespon/assets/images/POLVOLAB_Mel_4.png" alt="Mel Mesmo">
      </section>
      <section class="col d-flex flex-column position-relative text-white">
        <img class="position-absolute grafismo z-1 top-0 end-0" src="wp-content/themes/esespon/assets/images/POLVOLAB_Grafismo_2@2x.png" alt="">
        <section class="mel-texto">
          <img class="position-absolute bolinhas z-2" src="wp-content/themes/esespon/assets/images/POLVOLAB_Grafismo_2.svg" alt="">
          <?php
            $home_section_two = get_field('home_section_two', $home_page_id);
            echo apply_filters('the_content', $home_section_two);
          ?>
          <section class="buttn-group z-2">
          <button type="button" class="btn btn-light rounded-3">Compre</button>
          <a class="btn btn-outline-light rounded-3 ms-3" href="/produtos" role="button">Conheça</a>
        </section>
      </section>
      </section>
    </section>

    <section class="temos-feito cinzinha texto-azul">
      <h1>O que temos feito</h1>
      <section class="container posts-desk justify-content-center">
        <section class="posts-home row row-cols-1 row-cols-md-2 ms-0">
          <?php
            $args = array(
              'posts_per_page' => 5, // Number of posts to display
              'orderby' => 'date',   // Order by date
              'order' => 'ASC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
              $counter = 1;

              // Open the first section for small-post and diferentao
              echo '<section class="col d-flex flex-column gap-4 dif">';

              while ($query->have_posts()) :
                  $query->the_post();

                  $imagem_home = get_field('imagem_home');
                  if ($counter === 1 || $counter === 3) {
                    // Display first and third elements with small image
                    echo '<div class="post-item small-post text-white position-relative">';
                    echo '<h2 class="small-thumb position-absolute mt-3 mx-4">' . get_the_title() . '</h2>';
                    echo '<img class="" src="' . $imagem_home['url'] . '" alt="' . $imagem_home['alt'] . '">';
                    echo '<a class="ler-mais position-absolute" href="' . get_permalink() . '">Ler mais <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20.4416 8.44165L19.3725 9.51073L21.1059 11.2441H0V12.756H21.1059L19.3725 14.4894L20.4416 15.5584L24 12L20.4416 8.44165Z" fill="white"/>
                  </svg></a>';
                  echo '</div>';
                } elseif ($counter === 4 || $counter === 5) {
                    // Display fourth and fifth elements with large image
                    if ($counter === 4) {
                      // Apply specific styling for the first large-post
                      echo '<div class="post-item large-post text-white position-relative" style="height: 34.0625rem;">';
                  } else {
                      echo '<div class="post-item large-post text-white position-relative">';
                  }
                    echo '<h2 class="large-thumb position-absolute">' . get_the_title() . '</h2>';
                    if ($counter === 4) {
                      // Apply specific styling for the overlay and image
                      echo '<div class="overlay" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%), url(' . $imagem_home['url'] . '); width: 48.75rem; height: 34.0625rem; border-radius: 1.5rem;"></div>';
                  } else {
                    echo '<div class="overlay" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%), url(' . $imagem_home['url'] . '); width: 48.75rem; height: 32.75rem; border-radius: 1.5rem;"></div>';
                  }
                    //echo '<div class="overlay" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%), url(' . $imagem_home['url'] . '); width: 48.75rem; height: 32.75rem; border-radius: 1rem;"></div>';
                    echo '<a class="ler-mais position-absolute" href="' . get_permalink() . '">Ler mais <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20.4416 8.44165L19.3725 9.51073L21.1059 11.2441H0V12.756H21.1059L19.3725 14.4894L20.4416 15.5584L24 12L20.4416 8.44165Z" fill="white"/>
                  </svg></a>';
                  echo '</div>';
                  
                } else {
                  // Display second element with background color
                  echo '<div class="post-item diferentao azul-padrao position-relative">';
                  echo '<h1 class="mt-4 mx-3 text-start mb-3">' . get_the_title() . '</h1>';
                  echo custom_excerpt(); // Use the modified custom_excerpt function
                  echo '<a class="ler-mais position-absolute" href="' . get_permalink() . '">Ler mais <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M20.4416 8.44141L19.3725 9.51049L21.1059 11.2438H0V12.7557H21.1059L19.3725 14.4891L20.4416 15.5582L24 11.9998L20.4416 8.44141Z" fill="#1A1F33"/>
                </svg></a>';
                  echo '</div>';
                }
                  // Display Read More for all other elements
                  echo '</div>';
                  if ($counter === 3) {
                    // Close the section for small-post and diferentao
                    echo '</section>';
                    
                    // Open a new section for large-post
                    echo '<section class="col d-flex flex-column gap-4 dif-lg justify-content-between">';
                }
    
                $counter++;
              endwhile;
              // Close the last section
        echo '</section>';
            wp_reset_postdata();
            endif;
          ?>
        </section>
      </section>

      <section class="container posts-mobile">
        <section class="posts-mobile-home">
          <?php
              $args = array(
                'posts_per_page' => 5, // Number of posts to display
                'orderby' => 'date',   // Order by date
                'order' => 'ASC'
              );
              $query = new WP_Query($args);
              if ($query->have_posts()) :

                while ($query->have_posts()) :
                    $query->the_post();

                    $imagem_mobile = get_field('imagem_mobile');
                    if($imagem_mobile) {
                        echo '<div class="post-mobile-item mx-3 text-white position-relative">';
                      echo '<h2 class="position-absolute">' . get_the_title() . '</h2>';
                      echo '<div class="overlay" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%), url(' . $imagem_mobile['url'] . '); width: 18rem; height: 18rem; border-radius: 0.75rem;"></div>';
                      echo '<img class="img-fluid" src="' . $imagem_mobile['url'] . '" alt="' . $imagem_mobile['alt'] . '">';
                    echo '</div>';
                    
                  } else {
                    // No image, set background color and change h2 color
                    echo '<div class="no-image-bg post-mobile-item azul-padrao d-flex flex-column justify-content-end">';
                    echo '<h2 class="align-self-start">' . get_the_title() . '</h2>';
                    echo custom_excerpt(); 
                    echo '</div>';
                }
    
                echo '</div>';
                endwhile;
              wp_reset_postdata();
              endif;
          ?>
        </section>
      </section>

    </section>
    <section class="parceiros text-center cinzinha texto-azul">
        <?php
        $home_section_three = get_field('home_section_three', $home_page_id);
        echo apply_filters('the_content', $home_section_three); 
        ?>
      <section class="container">
        <section class="parceiros-desk row row-cols-lg-4 justify-content-center mx-5 gy-4">
            <?php
              // Check if the repeater field has rows
              if (have_rows('parceiros_cards', $home_page_id)) {
                  // Loop through the rows of the repeater field
                  while (have_rows('parceiros_cards', $home_page_id)) : the_row();
                      // Get subfield values
                      $image = get_sub_field('image');
            ?>
            <section class="col">
              <div class="parceiros-card d-flex align-items-center justify-content-center bg-white">
                <img class="parceiros-img z-1" src="<?php echo $image; ?>">
              </div>
            </section>
            <?php
            endwhile;
            } else {
                // No rows found
                echo 'No cards found.';
            }
          ?>
        </section>
        <section class="parceiros-slick">
            <?php
              // Check if the repeater field has rows
              if (have_rows('parceiros_cards', $home_page_id)) {
                  // Loop through the rows of the repeater field
                  while (have_rows('parceiros_cards', $home_page_id)) : the_row();
                      // Get subfield values
                      $image = get_sub_field('image');
            ?>
            <section class="col">
              <div class="parceiros-card d-flex align-items-center justify-content-center bg-white">
                <img class="parceiros-img z-1" src="<?php echo $image; ?>">
              </div>
            </section>
            <?php
            endwhile;
            } else {
                // No rows found
                echo 'No cards found.';
            }
          ?>
        </section>

        </section>
      </section>
    </section>
</main>

<?php
get_footer();
?>
