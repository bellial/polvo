<?php
/** 
 * * Template Name: Produtos
 * 
 * 
 * @package polvolab 
*/

get_header();
?>
<main class="cinzinha">

	<section class="carousel-wrapper w-100">
		<?php
			$produtos_page = get_page_by_path('produtos'); // Get the page object for "sobre-nos" page
			if( have_rows('carousel') )://made with ACF
				$i = 0; // Set the increment variable
		?>

		<div id="banner-carrossel" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php 
					$j = 0; //start the increment variable
					while( have_rows('carousel') ) : the_row();//made with ACF 
						$image = get_sub_field('image');
						$texto = get_sub_field('texto');
						$botoes = get_sub_field('botoes');
				?>
				<div class="carousel-item <?php if($j == 0) echo 'active';?>" data-bs-slide-to="<?php echo $j; ?>">
					<section class="position-absolute carousel-text text-white"><?php echo wpautop($texto); ?></section>
					<img src="<?php echo $image; ?>" class="d-block w-100" alt="...">
				</div>
				<?php
					  $j++; // Increment the increment variable
				  endwhile; //End the loop
					else :
					// no rows found
				endif;
				?>
			</div>
		</div>

		<!-- <div class="slick-arrow-up position-absolute"></div> -->
			<section class="controles container carousel">
				<button class="carousel-control-prev mb-3" type="button" data-bs-target="#banner-carrossel" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next mb-3" type="button" data-bs-target="#banner-carrossel" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
				<ul class="nav nav-pills nav-fill d-flex align-items-center flex-nowrap carousel-inner">
				<?php
				if (have_rows('carousel')) : // Made with ACF
					$j = 0; // Start the increment variable
					while (have_rows('carousel')) : the_row(); // Made with ACF
						$botoes = get_sub_field('botoes');
				?>
						<li class="nav-item carousel-item <?php if ($j == 0) echo 'active'; ?>" data-bs-slide-to="<?php echo $j; ?>" data-bs-target="#banner-carrossel">
							<a class="nav-link"><?php echo esc_html($botoes); ?></a>
						</li>
				<?php
						$j++; // Increment the increment variable
					endwhile; // End the loop
				else :
					// no rows found
				endif;
				?>
				</ul>
			</section>
		<!-- <div class="slick-arrow-down position-absolute top-0"></div> -->
	</section>
	<section class="carousel-mobile">
		<?php
			if( have_rows('carousel_mobile') )://made with ACF
				$i = 0; // Set the increment variable
		?>
		<!--Boostrap 5 carousel-->
		<div id="carrossel-mobile" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php 
					$j = 0; //start the increment variable
					while( have_rows('carousel_mobile') ) : the_row();//made with ACF 
						$image = get_sub_field('image');
						$texto = get_sub_field('texto');
				?>
				<div class="carousel-item position-relative text-white <?php if($j == 0) echo 'active';?>">
					<img src="<?php echo $image; ?>" class="w-100" alt="...">
					<section class="position-absolute top-0"><?php echo wpautop($texto); ?></section>
				</div><!--carousel-item-->
				<?php
					  $j++; // Increment the increment variable
				  endwhile; //End the loop
					  else :
					// no rows found
				endif;
				?>
			</div> <!--carousel-inner-->
		</div>
	</section>
	<?php
		if (have_rows('slider_cards')) : // Check if there are slider cards
			$i = 0; // Set the increment variable
	?>
	<section id="slider-cards-0" class="slider-cards">
		<div class="slider-cards-desk card card-body d-flex flex-row justify-content-center">
			<ul class="nav flex-column justify-content-center align-content-start">
				<?php
					$i = 0; // Set the increment variable
					while( have_rows('slider_cards') ) : the_row();//made with ACF 
						$image = get_sub_field('imagem');
						$texto = get_sub_field('texto');
						$botao = get_sub_field('botao');
						$card_id = 'card-' . $i; // Unique ID for each card
						$toggle_id = 'toggle-' . $i; // Use the slider-cards ID for toggle
                		$collapse_id = 'collapse-' . $i; // Use the slider-cards ID for collapse
				?>
				<li class="nav-item <?php if ($i == 0) echo 'active'; ?>">
					<a id="<?php echo $toggle_id; ?>" class="nav-link azul-padrao toggle-card text-uppercase" href="#<?php echo $collapse_id; ?>" role="button"><?php echo esc_html($botao); ?></a>
				</li>
				<?php
                    $i++; // Increment the increment variable
                	endwhile; //End the loop
                ?>
            </ul>
        <?php
        else :
            // no rows found
        endif;
        ?>
			<section class="row slider-cards-row">
				<?php
					$i = 0; // Reset the increment variable
					if (have_rows('slider_cards')) : //made with ACF
						while (have_rows('slider_cards')) : the_row(); //made with ACF 
							$image = get_sub_field('imagem');
							$texto = get_sub_field('texto');
							$card_id = 'card-' . $i; // Unique ID for each card
							$collapse_id = 'collapse-' . $i; // Use the slider-cards ID for collapse
				?>
				<div id="<?php echo $card_id; ?>" class="col">
					<div id="<?php echo $collapse_id; ?>" class="custom-collapse" style="opacity: 1;">
					<div class="card card-body azul-padrao border border-0 d-flex align-items-center flex-row">
						<section>
							<?php echo wpautop($texto); ?>
						</section>
						<section class="slider-img-wrapper position-relative">
							<img class="slider-img z-1 position-relative" src="<?php echo $image; ?>" >
							<img class="position-absolute bola-amarela translate-middle" src="../wp-content/themes/esespon/assets/images/Polygon5.svg" alt="">
							<img class="bolinha-azul position-absolute translate-middle z-1" src="../wp-content/themes/esespon/assets/images/Polygon6.svg" alt="">
						</section>
					</div>
					</div>
				</div>
				<!-- <div class="col">
					<div id="quem-faz-card" class="custom-collapse">
					<div class="card card-body azul-padrao border border-0 d-flex align-items-center flex-row">
					<section>
						<p>Os apicultores responsáveis pelo Mel Mesmo se organizam por meio da COMAPI, Cooperativa Mista dos Apicultores da Microrregião de Simplício Mendes, no interior do Piauí.</p>
						<p>Cerca de 600 famílias da região ganharam uma nova perspectiva para ampliar sua renda, após verem sua produção de mel ser transformada em produto com uma marca reconhecida no mercado.</p>
					</section>
					<section class="slider-img-wrapper position-relative">
						<img class="slider-img z-1 position-relative" src="../wp-content/themes/esespon/assets/images/image.svg" >
						<img class="position-absolute bola-amarela-quem-faz translate-middle" src="../wp-content/themes/esespon/assets/images/Polygon5.svg" alt="">
						<img class="bolinha-azul-quem-faz position-absolute translate-middle z-1" src="../wp-content/themes/esespon/assets/images/Polygon6.svg" alt="">
					</section>
					</div>
					</div>
				</div>-->
				<?php
					$i++; // Increment the increment variable
					endwhile; //End the loop
						else :
						// no rows found
					endif;
				?>
			</section>
		</div>

		<div class="slider-cards-mobile card card-body d-flex justify-content-center">
    <ul class="nav flex-column justify-content-center align-content-start">
        <?php
        $i = 0; // Set the increment variable
        $displayFirstLi = true; // Initialize a variable to control the display of the first <li>
        $firstBotao = ''; // Initialize a variable to store the first botao
        while (have_rows('slider_cards')) : the_row(); // Made with ACF
            $image = get_sub_field('imagem');
            $texto = get_sub_field('texto');
            $botao = get_sub_field('botao');
            $card_id = 'card-' . $i; // Unique ID for each card

            if ($i == 0) {
                $firstBotao = $botao;
            }

            $i++; // Increment the increment variable

            // Check if it's the first item and set the flag to stop displaying the first <li>
            if ($i == 0) {
                $displayFirstLi = true;
            }

        endwhile; // End the loop
        ?>
    </ul>

    <section class="slider-img-wrapper position-relative">
        <?php
        // Display the second image
        echo '<img class="slider-img z-1 position-relative" src="' . $image . '" >';
        echo '<img class="position-absolute bola-amarela translate-middle" src="../wp-content/themes/esespon/assets/images/Polygon5.svg" alt="">';
        echo '<img class="bolinha-azul position-absolute translate-middle z-1" src="../wp-content/themes/esespon/assets/images/Polygon6.svg" alt="">';
        ?>
    </section>

    <section class="row slider-cards-row">
        <?php
        $i = 0; // Reset the increment variable
        if (have_rows('slider_cards')) : // Made with ACF
            while (have_rows('slider_cards')) : the_row(); // Made with ACF 
                $image = get_sub_field('imagem');
                $texto = get_sub_field('texto');
                $card_id = 'card-' . $i; // Unique ID for each card
        ?>

                <?php if ($displayFirstLi) : ?>
                    <li class="nav-item active<?php echo ($i == 0) ? ' first-li' : ''; ?>">
                        <h3 class="nav-link azul-padrao toggle-card text-uppercase"><?php echo ($i == 0) ? esc_html($firstBotao) : esc_html($botao); ?></h3>
                    </li>
                <?php endif; ?>

                <div id="<?php echo $card_id; ?>" class="col-sm">
                    <div class="card card-body azul-padrao border border-0 d-flex align-items-center">
                        <section>
                            <?php echo wpautop($texto); ?>
                        </section>
                    </div>
                </div>

        <?php
                $i++; // Increment the increment variable
            endwhile; // End the loop
        else :
            // no rows found
        endif;
        ?>
    </section>
</div>



	</section>
	

	<!--O código abaixo é para os campos de Produtos do ACF
	<?php
		if (have_rows('slider_cards_2')) : // Check if there are slider cards
			$i = 0; // Set the increment variable
	?>
	<section id="slider-cards-1" class="slider-cards">
		<div class="card card-body d-flex flex-row justify-content-center">
			<ul class="nav flex-column justify-content-center align-content-start">
				<?php
					$i = 0; // Set the increment variable
					while( have_rows('slider_cards_2') ) : the_row();//made with ACF 
						$image = get_sub_field('imagem');
						$texto = get_sub_field('texto');
						$botao = get_sub_field('botao');
						$card_id = 'card-2-' . $i; // Unique ID for each card
						$toggle_id = 'toggle-2-' . $i; // Use the slider-cards ID for toggle
                		$collapse_id = 'collapse-2-' . $i; // Use the slider-cards ID for collapse
				?>
				<li class="nav-item <?php if ($i == 0) echo 'active'; ?>">
					<a id="<?php echo $toggle_id; ?>" class="nav-link azul-padrao toggle-card text-uppercase" href="#<?php echo $collapse_id; ?>" role="button"><?php echo esc_html($botao); ?></a>
				</li>
				<?php
                    $i++; // Increment the increment variable
                	endwhile; //End the loop
                ?>
            </ul>
        <?php
			else :
				// no rows found
			endif;
        ?>
			<section class="row slider-cards-row">
				<?php
					$i = 0; // Reset the increment variable
					if (have_rows('slider_cards_2')) : //made with ACF
						while (have_rows('slider_cards_2')) : the_row(); //made with ACF 
							$image = get_sub_field('imagem');
							$texto = get_sub_field('texto');
							$card_id = 'card-2-' . $i; // Unique ID for each card
							$collapse_id = 'collapse-2-' . $i; // Use the slider-cards ID for collapse
				?>
				<div id="<?php echo $card_id; ?>" class="col">
					<div id="<?php echo $collapse_id; ?>" class="custom-collapse" style="opacity: 1;">
					<div class="card card-body azul-padrao border border-0 d-flex align-items-center flex-row">
						<section>
							<?php echo wpautop($texto); ?>
						</section>
						<section class="slider-img-wrapper position-relative">
							<img class="slider-img z-1 position-relative" src="<?php echo $image; ?>" >
							<img class="position-absolute bola-amarela translate-middle" src="../wp-content/themes/esespon/assets/images/Polygon5.svg" alt="">
							<img class="bolinha-azul position-absolute translate-middle z-1" src="../wp-content/themes/esespon/assets/images/Polygon6.svg" alt="">
						</section>
					</div>
					</div>
				</div>
				<?php
					$i++; // Increment the increment variable
					endwhile; //End the loop
						else :
						// no rows found
					endif;
				?>
			</section>
		</div>
	</section>


	<?php
		if (have_rows('slider_cards_3')) : // Check if there are slider cards
			$i = 0; // Set the increment variable
	?>
	<section id="slider-cards-2" class="slider-cards">
		<div class="card card-body d-flex flex-row justify-content-center">
			<ul class="nav flex-column justify-content-center align-content-start">
				<?php
					$i = 0; // Set the increment variable
					while( have_rows('slider_cards_3') ) : the_row();//made with ACF 
						$image = get_sub_field('imagem');
						$texto = get_sub_field('texto');
						$botao = get_sub_field('botao');
						$card_id = 'card-3-' . $i; // Unique ID for each card
						$toggle_id = 'toggle-3-' . $i; // Use the slider-cards ID for toggle
                		$collapse_id = 'collapse-3-' . $i; // Use the slider-cards ID for collapse
				?>
				<li class="nav-item <?php if ($i == 0) echo 'active'; ?>">
					<a id="<?php echo $toggle_id; ?>" class="nav-link azul-padrao toggle-card text-uppercase" href="#<?php echo $collapse_id; ?>" role="button"><?php echo esc_html($botao); ?></a>
				</li>
				<?php
                    $i++; // Increment the increment variable
                	endwhile; //End the loop
                ?>
            </ul>
        <?php
        else :
            // no rows found
        endif;
        ?>
			<section class="row slider-cards-row">
				<?php
					$i = 0; // Reset the increment variable
					if (have_rows('slider_cards_3')) : //made with ACF
						while (have_rows('slider_cards_3')) : the_row(); //made with ACF 
							$image = get_sub_field('imagem');
							$texto = get_sub_field('texto');
							$card_id = 'card-3-' . $i; // Unique ID for each card
							$collapse_id = 'collapse-3-' . $i; // Use the slider-cards ID for collapse
				?>
				<div id="<?php echo $card_id; ?>" class="col">
					<div id="<?php echo $collapse_id; ?>" class="custom-collapse" style="opacity: 1;">
					<div class="card card-body azul-padrao border border-0 d-flex align-items-center flex-row">
						<section>
							<?php echo wpautop($texto); ?>
						</section>
						<section class="slider-img-wrapper position-relative">
							<img class="slider-img z-1 position-relative" src="<?php echo $image; ?>" >
							<img class="position-absolute bola-amarela translate-middle" src="../wp-content/themes/esespon/assets/images/Polygon5.svg" alt="">
							<img class="bolinha-azul position-absolute translate-middle z-1" src="../wp-content/themes/esespon/assets/images/Polygon6.svg" alt="">
						</section>
					</div>
					</div>
				</div>
				<?php
					$i++; // Increment the increment variable
					endwhile; //End the loop
						else :
						// no rows found
					endif;
				?>
			</section>
		</div>
	</section>-->


	<section class="text-center objetivos-h1">
		<?php
			if ($produtos_page) {
				$produtos_content = $produtos_page->post_content;
				echo apply_filters('the_content', $produtos_content);
			}
		?>
		<section class="position-relative objetivos-wrapper">
			<?php
				$counter = 1; // Initialize a counter variable
				if (have_rows('objetivos', $produtos_page)) {
					// Loop through the ACF repeater for desktop images
					while (have_rows('objetivos', $produtos_page)) : the_row();
						$bg_image_url = get_sub_field('imagem');
						$image_class = 'obj-' . $counter; // Create a unique class for each image
						$counter++; // Increment the counter
						echo '<style>';
						echo '.objetivos-wrapper.' . $image_class . '{ background-image: url("' . $bg_image_url . '"); }';
						echo '</style>';
					endwhile;
				}
			?>
			<section class="container">
				<section class="row row-cols-lg-2 objetivos-row justify-content-center align-items-center text-white">
					<?php
					// Reset the counter outside the loop
					$counter = 1;
					if (have_rows('objetivos', $produtos_page)) {
						$counter = 1; // Initialize a counter variable
						while (have_rows('objetivos', $produtos_page)) : the_row();
							$obj_label = get_sub_field('label');
							$obj_text = get_sub_field('texto');
							$obj_icon = get_sub_field('icone');
							$image_class = 'obj-' . $counter; // Create a unique class for each image
							// Determine if this is the first element, and add the "active" class if it is
							$active_class = ($counter === 1) ? ' active' : '';

							$counter++; // Increment the counter

					echo '<div class="col-lg objetivos-blur d-flex flex-column align-items-start justify-content-between text-start p-3' . $active_class . '" data-target="'.$image_class.'">';
						echo '<div>';
						echo '<img src="'.$obj_icon.'" alt="">';
						echo '<h2>'.$obj_label.'</h2>';
						echo '</div>';
						echo wpautop($obj_text);
					echo '</div>';
					endwhile;
					}
					?>
				</section>
			</section>
		</section>
	</section>
	<section class="missao impacto cinzinha">
		<div class="missao-btn text-center mb-3">
			<button type="button" class="btn rounded-pill azul-botao text-uppercase botao-impacto active" data-bs-toggle="collapse" data-bs-target="#collapseMissao" aria-expanded="false" aria-controls="collapseMissao">Impacto Social</button>
			<button type="button" class="btn rounded-pill azul-botao text-uppercase" data-bs-toggle="collapse" data-bs-target="#collapseVisao" aria-expanded="false" aria-controls="collapseVisao">Impacto Ambiental</button>
		</div>
		<section class="missao-wrapper">
			<section id="collapseMissao" class="collapse multi-collapse show row row-cols-lg-2 polvo-wrapper missao-content m-0 align-items-center">
				<section class="col position-relative p-0 margin-4">
					<section class="azul-polvo missao-text text-white position-relative">
						<img class="position-absolute" src="../wp-content/themes/esespon/assets/images/grafismo_1_4.svg" alt="">
						<div class="position-absolute top-50 start-50 translate-middle impacto-text">
							<?php
								$impacto = get_field('impacto_social', $produtos_page);
								echo apply_filters('the_content', $impacto);
							?>
						</div>
					</section>
					<div class="arrow-up position-absolute end-5"></div>
				</section>
				<div class="col missao-img p-0 visao-img-wrapper social-img z-1">
					<?php
						// Get the ACF image field value
						$image_url = get_field('impacto_social_imagem', $produtos_page);

						// Check if the ACF image field has a value
						if ($image_url) {
							// Output the image element with the ACF image URL as the src attribute
							echo '<img class="img-fluid w-100 rounded-15 object-fit-cover" src="' . $image_url . '" alt="" />';
						}
					?>
				</div>
			</section>
			<section id="collapseVisao" class="collapse multi-collapse row row-cols-lg-2 polvo-wrapper missao-content m-0 align-items-center">
				<div class="col missao-img p-0 visao-img-wrapper z-1 visao-img-mobile">
				<?php
						// Get the ACF image field value
						$image_url = get_field('impacto_ambiental_imagem', $produtos_page);

						// Check if the ACF image field has a value
						if ($image_url) {
							// Output the image element with the ACF image URL as the src attribute
							echo '<img class="img-fluid rounded-end w-100 rounded-15 object-fit-cover ambiental-img" src="' . $image_url . '" alt="" />';
						}
					?>
				</div>
				<section class="col-lg position-relative p-0 margin-4">
					<section class="azul-polvo missao-text text-white position-relative">
						<img class="position-absolute visao-vector end-0" src="../wp-content/themes/esespon/assets/images/grafismo_1_4.svg" alt="">
						<div class="position-absolute top-50 start-50 translate-middle">
							<?php
								$ambiental = get_field('impacto_ambiental', $produtos_page);
								echo apply_filters('the_content', $ambiental); 
							?>
						</div>
					</section>
					<div class="arrow-up position-absolute start-5"></div>
				</section>
			</section>
		</section>
	</section>
	<section class="resultados-wrapper cinzinha text-center">
		<?php
			$result = get_field('resultados', $produtos_page);
			echo apply_filters('the_content', $result); 
		?>
		<section class="position-relative">
			<section class="resultados-vector">
				<img class="position-absolute top-0 start-0 w-100" src="../wp-content/themes/esespon/assets/images/top-vector.svg" alt="">
				<img class="position-absolute start-0 w-100 top-7" src="../wp-content/themes/esespon/assets/images/middle-vector.svg" alt="">
				<img class="position-absolute start-0 w-100 end-30" src="../wp-content/themes/esespon/assets/images/bottom-vector.svg" alt="">
			</section>
			<img class="position-absolute start-0 dots" src="../wp-content/themes/esespon/assets/images/left-dots.svg" alt="">
			<img class="position-absolute end-0 dots" src="../wp-content/themes/esespon/assets/images/right-dots.svg" alt="">
			
			<section class="position-relative resultados-desk">
				<section>
					<img class="position-absolute balls-1" src="../wp-content/themes/esespon/assets/images/Polygon2-desk.svg" alt="">
					<section class="position-absolute resultados-1 text-white">
						<h1>672</h1>
						<p>famílias impactadas diretamente com a venda do Mel Mesmo</p>
					</section>
				</section>

				<section>
					<img class="position-absolute balls-2" src="../wp-content/themes/esespon/assets/images/Polygon7-desk.svg" alt="">
					<section class="position-absolute resultados-2 azul-padrao">
						<h1>AAA</h1>
						<p>presença no mercado brasileiro</p>
					</section>
				</section>

				<section>
					<img class="position-absolute balls-3" src="../wp-content/themes/esespon/assets/images/Polygon8-desk.svg" alt="">
					<section class="position-absolute resultados-3 azul-padrao">
						<h1>508.59%</h1>
						<p>aumento da margem de lucro para cooperativa</p>
					</section>
				</section>

				<section>
					<img class="position-absolute balls-4" src="../wp-content/themes/esespon/assets/images/Polygon10-desk.svg" alt="">
					<section class="position-absolute resultados-4 text-white">
						<h1>25%</h1>
						<p>acréscimo de renda para o apicultor</p>
					</section>
				</section>

				<section>
					<img class="position-absolute balls-5" src="../wp-content/themes/esespon/assets/images/Polygon9-desk.svg" alt="">
					<section class="position-absolute resultados-5 text-white">
						<h1>133.33%</h1>
						<p>Valorização do produto</p>
					</section>
				</section>
			</section>
			<script>
				const themeBaseUrl = "<?php echo get_stylesheet_directory_uri(); ?>";
			</script>
			<section class="resultados-slick">
				<img src="../wp-content/themes/esespon/assets/images/Polygon2.svg" alt="">
				<img src="../wp-content/themes/esespon/assets/images/Polygon7.svg" alt="">
				<img src="../wp-content/themes/esespon/assets/images/Polygon8.svg" alt="">
				<img src="../wp-content/themes/esespon/assets/images/Polygon10.svg" alt="">
				<img src="../wp-content/themes/esespon/assets/images/Polygon9.svg" alt="">
			</section>
		</section>
	</section>
	<section class="text-center azul-padrao cinzinha">
		<?php
			$conheca = get_field('conheca', $produtos_page);
			echo apply_filters('the_content', $conheca); 
		?>
		<section class="container conheca">
			<section class="row row-cols-4 justify-content-center mx-5 conheca-desk">
				<?php
				// Check if the repeater field has rows
				if (have_rows('parceiros_produtos', $produtos_page)) {
					$counter = 0; // Initialize a counter variable
					// Loop through the rows of the repeater field
					while (have_rows('parceiros_produtos', $produtos_page)) : the_row();
						// Get subfield values
						$image = get_sub_field('image');
						// Define an array of classes in the desired order
						$classes = array('sertao', 'meltag', 'favila', 'bahia');
						// Determine the class based on the counter
						$class = isset($classes[$counter]) ? $classes[$counter] : '';

						// Increment the counter
						$counter++;
				?>
				<section class="col">
					<div class="parceiros-card d-flex align-items-center justify-content-center bg-white">
						<img class="produtos-img z-1 <?php echo esc_attr($class); ?>" src="<?php echo $image; ?>">
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
				if (have_rows('parceiros_produtos', $produtos_page)) {
					$counter = 0; // Initialize a counter variable
					// Loop through the rows of the repeater field
					while (have_rows('parceiros_produtos', $produtos_page)) : the_row();
						// Get subfield values
						$image = get_sub_field('image');
						// Define an array of classes in the desired order
						$classes = array('sertao', 'meltag', 'favila', 'bahia');
						// Determine the class based on the counter
						$class = isset($classes[$counter]) ? $classes[$counter] : '';

						// Increment the counter
						$counter++;
				?>
				<section class="col">
					<div class="parceiros-card d-flex align-items-center justify-content-center bg-white">
						<img class="produtos-img z-1 <?php echo esc_attr($class); ?>" src="<?php echo $image; ?>">
					</div>
				</section>
				<!-- <section class="col">
					<div class="parceiros-card d-flex align-items-center justify-content-center bg-white">
						<img class="produtos-img z-1 meltag" src="../wp-content/themes/esespon/assets/images/meltag.png">
					</div>
				</section>
				<section class="col">
					<div class="parceiros-card d-flex align-items-center justify-content-center bg-white">
					<img class="produtos-img z-1 favila" src="../wp-content/themes/esespon/assets/images/favila.png">
					</div>
				</section>
				<section class="col">
					<div class="parceiros-card d-flex align-items-center justify-content-center bg-white">
					<img class="produtos-img z-1 bahia" src="../wp-content/themes/esespon/assets/images/bahia.png">
					</div>
				</section> -->
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
</main>
<?php
get_footer();
