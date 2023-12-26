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

	<section class="carousel-wrapper">
		<?php
				if( have_rows('carousel') )://made with ACF
				  $i = 0; // Set the increment variable
				?>
			   <!--Boostrap 5 carousel-->
			  <div id="banner-carrossel" class="carousel-slick position-absolute top-0 w-100 vh-100" data-bs-touch="true" data-interval="4000">
		
				<div class="carousel-slick-inner">
				  <?php 
					$j = 0; //start the increment variable
					while( have_rows('carousel') ) : the_row();//made with ACF 
					 $image = get_sub_field('image');
					 $texto = get_sub_field('texto');
					 $botoes = get_sub_field('botoes');
				  ?>
				  <div class="carousel-slick-item position-relative <?php if($j == 0) echo 'active';?>">
					<section class="position-absolute carousel-text text-white"><?php echo wpautop($texto); ?></section>
					  <img src="<?php echo $image; ?>" class="d-block w-100" alt="...">
					</a>
				  </div><!--carousel-item-->
				<?php   
					  $j++; // Increment the increment variable
				  endwhile; //End the loop
					  else :
					// no rows found
				endif; 
				?>
				</div> <!--carousel-inner-->    
			  </div><!--carousel-->
	</section>
	<div class="slick-arrow-up position-absolute"></div>
	<section class="controles container">
		<script>
		const themeBaseUrl = "<?php echo get_stylesheet_directory_uri(); ?>";
		</script>
		<ul class="nav nav-pills nav-fill d-flex align-items-center flex-nowrap">
		<?php
        if (have_rows('carousel')) : // Made with ACF
            $j = 0; // Start the increment variable
            while (have_rows('carousel')) : the_row(); // Made with ACF 
                $botoes = get_sub_field('botoes');
        ?>
                <li class="nav-item">
                    <a class="nav-link <?php if ($j == 0) echo 'active'; ?>" data-bs-toggle="collapse" href="#collapseCard"><?php echo esc_html($botoes); ?></a>
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
	<section class="slider-cards">	
			<div class="card card-body position-relative d-flex flex-row">
				<div class="slick-arrow-down position-absolute top-0"></div>
				<ul class="nav flex-column justify-content-center align-content-start">
					<li class="nav-item">
						<a class="nav-link azul-padrao"  data-bs-toggle="collapse" href="#sobre-card" role="button" aria-expanded="true" aria-controls="sobre-card">SOBRE</a>
					</li>
					<li class="nav-item">
						<a class="nav-link azul-padrao"  data-bs-toggle="collapse" href="#quem-faz-card" role="button" aria-expanded="false" aria-controls="quem-faz-card">QUEM FAZ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link azul-padrao"  data-bs-toggle="collapse" href="#onde-card" role="button" aria-expanded="false" aria-controls="onde-card">ONDE</a>
					</li>
					<li class="nav-item">
						<a class="nav-link azul-padrao"  data-bs-toggle="collapse" href="#como-card" role="button" aria-expanded="false" aria-controls="como-card">COMO</a>
					</li>
				</ul>
				<section class="row">
					<div class="col">
						<div class="collapse show" id="sobre-card">
						<div class="card card-body azul-padrao border border-0 d-flex align-items-center flex-row">
							<section>
								<p>Você sabia que o mel é o terceiro alimento mais falsificado no mundo?</p>
								<p>O Mel Mesmo tem esse nome porque não tem nenhum composto adicionado, é um produto integral, natural, orgânico certificado e sem nenhum aditivo.</p>
								<p>O mel produzido na Caatinga do Piauí é muito puro porque fica longe de qualquer monocultura.</p>
							</section>
							<section class="slider-img-wrapper position-relative">
								<img class="slider-img z-1 position-relative" src="../wp-content/themes/esespon/assets/images/Rectangle11.png" >
								<img class="position-absolute top-0 translate-middle" src="../wp-content/themes/esespon/assets/images/Polygon5.svg" alt="">
								<img class="bolinha-azul position-absolute start-0 translate-middle z-1" src="../wp-content/themes/esespon/assets/images/Polygon6.svg" alt="">
						</section>
						</div>
						</div>
					</div>
					<div class="col">
						<div class="collapse" id="quem-faz-card">
						<div class="card card-body azul-padrao border border-0 d-flex align-items-center flex-row">
						<section>
							<p>Os apicultores responsáveis pelo Mel Mesmo se organizam por meio da COMAPI, Cooperativa Mista dos Apicultores da Microrregião de Simplício Mendes, no interior do Piauí.</p>
							<p>Cerca de 600 famílias da região ganharam uma nova perspectiva para ampliar sua renda, após verem sua produção de mel ser transformada em produto com uma marca reconhecida no mercado.</p>
						</section>
						<section class="slider-img-wrapper position-relative">
							<img class="slider-img z-1 position-relative" src="../wp-content/themes/esespon/assets/images/image.svg" >
							<img class="position-absolute top-50 translate-middle" src="../wp-content/themes/esespon/assets/images/Polygon5.svg" alt="">
							<img class="bolinha-azul-quem-faz position-absolute start-0 translate-middle z-1" src="../wp-content/themes/esespon/assets/images/Polygon6.svg" alt="">
						</section>
						</div>
						</div>
					</div>
					<div class="col">
						<div class="collapse" id="onde-card">
						<div class="card card-body azul-padrao border border-0 d-flex align-items-center flex-row">
							Some placeholder content for the second collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
						</div>
						</div>
					</div>
					<div class="col">
						<div class="collapse" id="como-card">
						<div class="card card-body azul-padrao border border-0 d-flex align-items-center flex-row">
							Some placeholder content for the second collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
						</div>
						</div>
					</div>
				</section>
			</div>
	</section>
	<section class="text-center objetivos-h1">
		<h1 class="azul-padrao">Objetivos de Impacto</h1>
		<section class="position-relative objetivos-wrapper obj-1 hovered">
			<section class="container">
				<section class="row row-cols-2 objetivos-row justify-content-center align-items-center text-white">
					<div class="col objetivos-blur d-flex flex-column align-items-start justify-content-between text-start p-3" data-target="obj-1">
						<div>
							<img src="../wp-content/themes/esespon/assets/images/Moneybox.svg" alt="">
							<h2>Renda</h2>
						</div>
							<p>Assegurar incremento de renda digno e sustentável para as famílias apicultoras.</p>
					</div>
					<div class="col objetivos-blur d-flex flex-column align-items-start justify-content-between text-start p-3" data-target="obj-2">
						<div>
							<img src="../wp-content/themes/esespon/assets/images/Dropofliquid1.svg" alt="">
							<h2>Água</h2>
						</div>
							<p>Garantir segurança hídrica com água potável para as 41 comunidades apicultoras.</p>
					</div>
					<div class="col objetivos-blur d-flex flex-column align-items-start justify-content-between text-start p-3" data-target="obj-3">
						<div>
							<img src="../wp-content/themes/esespon/assets/images/Graduationcap2.svg" alt="">
							<h2>Educação</h2>
						</div>
							<div>
								<p>Garantir a melhoria educacional e cognitiva dos apicultores adultos.</p>
								<p>Fomentar o empreendedorismo dos jovens para incentivar a apicultura local.</p>
								<p>Garantir a alfabetização na primeira infância para apoiar a mobilidade social dos apicultores da região.</p>
							</div>
					</div>
					<div class="col objetivos-blur d-flex flex-column align-items-start justify-content-between text-start p-3" data-target="obj-4">
						<div>
							<img src="../wp-content/themes/esespon/assets/images/Cactus1.svg" alt="">
							<h2>Preservação do bioma Caatinga</h2>
						</div>
							<p>A apicultura, que já é uma atividade de baixo carbono, ajuda na polinização e na regeneração da mata nativa.</p>
					</div>
				</section>
			</section>
		</section>
	</section>
	<section class="missao impacto cinzinha">
		<div class="missao-btn text-center mb-3">
			<button type="button" class="btn rounded-pill azul-botao text-uppercase me-5 active" data-bs-toggle="collapse" data-bs-target="#collapseMissao" aria-expanded="false" aria-controls="collapseMissao">Impacto Social</button>
			<button type="button" class="btn rounded-pill azul-botao text-uppercase" data-bs-toggle="collapse" data-bs-target="#collapseVisao" aria-expanded="false" aria-controls="collapseVisao">Impacto Ambiental</button>
		</div>
		<section class="missao-wrapper">
			<section id="collapseMissao" class="collapse multi-collapse show row row-cols-2 polvo-wrapper missao-content m-0 align-items-center">
				<section class="col position-relative p-0 margin-4">
					<section class="azul-polvo missao-text text-white position-relative">
						<img class="position-absolute impacto-img" src="../wp-content/themes/esespon/assets/images/grafismo_1_4.svg" alt="">
						<div class="position-absolute top-50 start-50 translate-middle">
							<h1>Impacto Social</h1>
							<div class="impacto-p">
								<p>Os apicultores responsáveis pelo Mel Mesmo se organizam por meio da COMAPI, Cooperativa Mista dos Apicultores da Microrregião de Simplício Mendes, no interior do Piauí.</p>
								<p>Cerca de 600 famílias da região passaram a ter sustento garantido graças a apicultura e ganharam uma nova perspectiva para ampliar sua renda, após verem sua produção de mel ser transformada em produto com uma marca reconhecida no mercado.</p>
								<p>Com o crescimento da produção, temos o potencial de chegar a 800 famílias impactadas.</p>
							</div>
						</div>
					</section>
					<div class="arrow-up position-absolute end-5"></div>
				</section>
				<div class="col missao-img social-img p-0 rounded-start"></div>
			</section>
			<section id="collapseVisao" class="collapse multi-collapse row row-cols-2 polvo-wrapper missao-content m-0 align-items-center">
				<div class="col missao-img p-0 visao-img-wrapper">
					<img class="img-fluid rounded-end w-100 h-100 object-fit-cover ambiental-img" src="../wp-content/themes/esespon/assets/images/mata.jpg" alt="" />
				</div>
				<section class="col position-relative p-0 margin-4">
					<section class="azul-polvo missao-text text-white position-relative">
						<img class="position-absolute visao-vector end-0" src="../wp-content/themes/esespon/assets/images/grafismo_1_4.svg" alt="">
						<div class="position-absolute top-50 start-50 translate-middle">
							<h1>Impacto Ambiental</h1>
							<p>Caatinga é um bioma exclusivamente brasileiro e é considerada uma das 37 regiões do planeta que devem ser conservadas, pois contribui para a manutenção do clima global, além de apresentar grande biodiversidade. Contudo, a Caatinga é um dos biomas mais ameaçados e degradados do país, por conta da desertificação, depreciação do solo e desmatamento.</p>
						</div>
					</section>
					<div class="arrow-up position-absolute start-5"></div>
				</section>
			</section>
		</section>
	</section>
	<section class="resultados-wrapper cinzinha text-center">
		<h1>Resultados</h1>
		<section class="position-relative">
			<section class="resultados-vector">
				<img class="position-absolute top-0 start-0 w-100" src="../wp-content/themes/esespon/assets/images/top-vector.svg" alt="">
				<img class="position-absolute start-0 w-100 top-7" src="../wp-content/themes/esespon/assets/images/middle-vector.svg" alt="">
				<img class="position-absolute start-0 w-100 end-30" src="../wp-content/themes/esespon/assets/images/bottom-vector.svg" alt="">
			</section>
			<img class="position-absolute start-0" src="../wp-content/themes/esespon/assets/images/left-dots.svg" alt="">
			<img class="position-absolute end-0" src="../wp-content/themes/esespon/assets/images/right-dots.svg" alt="">
			<section class="position-relative">
				<img class="position-absolute balls" src="../wp-content/themes/esespon/assets/images/balls.svg" alt="">
				<section class="position-absolute resultados-1 text-white">
					<h1>672</h1>
					<p>famílias impactadas diretamente com a venda do Mel Mesmo</p>
				</section>
				<section class="position-absolute resultados-2 azul-padrao">
					<h1>AAA</h1>
					<p>presença no mercado brasileiro</p>
				</section>
				<section class="position-absolute resultados-3 azul-padrao">
					<h1>508.59%</h1>
					<p>aumento da margem de lucro para cooperativa</p>
				</section>
				<section class="position-absolute resultados-4 text-white">
					<h1>25%</h1>
					<p>acréscimo de renda para o apicultor</p>
				</section>
				<section class="position-absolute resultados-5 text-white">
					<h1>133.33%</h1>
					<p>Valorização do produto</p>
				</section>
			</section>
		</section>
	</section>
	<section class="text-center azul-padrao cinzinha">
		<h1>Conheça nossos produtos</h1>
		<p class="produtos-p mx-auto">Nossa atuação só é possível por conta dos nossos parceiros, instituições que detém o conhecimento do território e nos possibilitam gerar impacto integral de forma real e sustentável.</p>
		<section class="container conheca">
			<section class="row row-cols-4 justify-content-center mx-5">
				<section class="col">
					<div class="parceiros-card d-flex align-items-center justify-content-center bg-white">
						<img class="produtos-img z-1 sertao" src="../wp-content/themes/esespon/assets/images/sertao.png">
					</div>
				</section>
				<section class="col">
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
				</section>
			</section>
		</section>
	</section>
</main>
<?php
get_footer();
