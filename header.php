<?php

/**
 * The header for your theme.
 *
 * The header template file usually contains your site’s document type, meta information, links to stylesheets and scripts, 
 * and other data.
 * @package polvolab
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<meta name="description" content="O Polvo Lab é um Fundo Privado que roda o Brasil preparando produtos de qualidade para o mercado, de cadeias produtivas que gerem mais renda na ponta.">
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-WKRBB8NLHR"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-WKRBB8NLHR');
	</script>
	<?php wp_head(); ?>

	<style>


.desktop-natal{
	display:block;
  
	text-align: center!important;

	}
	.mobile-natal{
	display: none;
	/* padding-bottom: 60px; */
	/* margin-bottom: -50px; */
	}

	@media only screen and (max-width: 767px) {

.desktop-natal{
display:none;
}
.mobile-natal{
display: block;
/* padding-bottom: 60px; */
/* margin-bottom: -50px; */
}
}

		</style>
</head>

<body <?php body_class('no-js'); ?> id="site-container" class="overflow-x-hidden m-0 p-0">

	<?php wp_body_open(); ?>

		<header class="header-desk position-relative z-2">
			<nav class="cabecalho bg-white container-lg">
				<div class="navbar navbar-expand-lg">
					<section class="reverse-mobile d-flex">
						<?php if (has_custom_logo()) :
								// Get the Custom Logo URLs for both desktop and mobile
								$custom_logo_id = get_theme_mod('custom_logo');
								$custom_logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
								$desktop_logo_url = $custom_logo_data[0];
								$mobile_logo_url = get_custom_mobile_logo_url();
							?>
							<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
								<img class="polvolab_logo" src="<?php echo esc_url($desktop_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
								<img class="polvolab_logo_mobile" src="<?php echo esc_url($mobile_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
							</a>
						<?php else : ?>
							<div class="navbar-brand site-name fw-bold"><?php bloginfo('name'); ?></div>
						<?php endif; ?>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span id="toggler-icon" class="navbar-toggler-icon"></span>
							</button>
					</section>
					<section>
						<button type="button" class="btn search-ico search-mobile" data-bs-toggle="collapse" data-bs-target="#search-form" aria-expanded="false" aria-controls="search-form">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<g clip-path="url(#clip0_624_35019)">
									<path d="M10.3096 0C16.0079 0 20.6193 4.61141 20.6193 10.3096C20.6193 12.7486 19.7775 15.0579 18.2324 16.9069L24 22.6746L22.6746 24L16.9069 18.2324C15.0579 19.7775 12.7486 20.6193 10.3096 20.6193C4.61141 20.6193 0 16.0079 0 10.3096C0 4.61141 4.61141 0 10.3096 0ZM10.3096 18.7448C14.9608 18.7448 18.7448 14.9608 18.7448 10.3096C18.7448 5.65849 14.9608 1.87448 10.3096 1.87448C5.65849 1.87448 1.87448 5.65849 1.87448 10.3096C1.87448 14.9608 5.65845 18.7448 10.3096 18.7448Z" fill="#142048"/>
								</g>
								<defs>
									<clipPath id="clip0_624_35019">
									<rect width="24" height="24" fill="white" transform="matrix(-1 0 0 1 24 0)"/>
									</clipPath>
								</defs>
							</svg>
						</button>
						<form id="search-form" class="search-form collapse position-absolute start-0 w-100" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input class="form-control mt-2" type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search" aria-label="Search">
						</form>
					</section>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php
						$args = array(
							'theme_location' => 'header', // Replace with your menu location
							'menu_class'     => 'navbar-nav', // Replace with your menu slug or ID
						);
						wp_nav_menu($args);
					?>
					<section class="d-flex justify-content-end align-items-center">
						<button type="button" class="btn search-ico search-desktop" data-bs-toggle="collapse" data-bs-target="#search-form" aria-expanded="false" aria-controls="search-form">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<g clip-path="url(#clip0_624_35019)">
									<path d="M10.3096 0C16.0079 0 20.6193 4.61141 20.6193 10.3096C20.6193 12.7486 19.7775 15.0579 18.2324 16.9069L24 22.6746L22.6746 24L16.9069 18.2324C15.0579 19.7775 12.7486 20.6193 10.3096 20.6193C4.61141 20.6193 0 16.0079 0 10.3096C0 4.61141 4.61141 0 10.3096 0ZM10.3096 18.7448C14.9608 18.7448 18.7448 14.9608 18.7448 10.3096C18.7448 5.65849 14.9608 1.87448 10.3096 1.87448C5.65849 1.87448 1.87448 5.65849 1.87448 10.3096C1.87448 14.9608 5.65845 18.7448 10.3096 18.7448Z" fill="#142048"/>
								</g>
								<defs>
									<clipPath id="clip0_624_35019">
									<rect width="24" height="24" fill="white" transform="matrix(-1 0 0 1 24 0)"/>
									</clipPath>
								</defs>
							</svg>
						</button>
						<a class="btn btn-warning btn-polvo" href="/contato" role="button">Seja um parceiro</a>
					</section>
					</div>
				</div>
			</nav>
		</header>
