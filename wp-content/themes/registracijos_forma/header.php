<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Registracijos_forma
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'registracijos_forma' ); ?></a>
	<header>
	    <div class="container-fluid">
            <div class="container">
				<div class="row header-contact-row">
					<a class="header-phone" href="tel:+37060000000">
					<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M17.4873 14.14L13.4223 10.444C13.2301 10.2693 12.9776 10.1762 12.7181 10.1842C12.4585 10.1922 12.2123 10.3008 12.0313 10.487L9.63828 12.948C9.06228 12.838 7.90428 12.477 6.71228 11.288C5.52028 10.095 5.15928 8.934 5.05228 8.362L7.51128 5.968C7.69769 5.78712 7.80642 5.54082 7.81444 5.2812C7.82247 5.02159 7.72917 4.76904 7.55428 4.57699L3.85928 0.512995C3.68432 0.320352 3.44116 0.203499 3.18143 0.187255C2.92171 0.17101 2.66588 0.256653 2.46828 0.425995L0.298282 2.28699C0.125393 2.46051 0.0222015 2.69145 0.00828196 2.93599C-0.00671804 3.18599 -0.292718 9.108 4.29928 13.702C8.30528 17.707 13.3233 18 14.7053 18C14.9073 18 15.0313 17.994 15.0643 17.992C15.3088 17.9783 15.5396 17.8747 15.7123 17.701L17.5723 15.53C17.7423 15.333 17.8286 15.0774 17.8127 14.8177C17.7968 14.558 17.68 14.3148 17.4873 14.14Z" fill="#6E757C"/>
					</svg>	
					+370 600 000 00</a>
					<a class="header-email" href="mailto: info@autoservisas.lt">
					<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M20 4.608V12.75C20.0001 13.5801 19.6824 14.3788 19.1123 14.9822C18.5422 15.5856 17.7628 15.948 16.934 15.995L16.75 16H3.25C2.41986 16.0001 1.62117 15.6824 1.01777 15.1123C0.414367 14.5422 0.0519987 13.7628 0.00500011 12.934L0 12.75V4.608L9.652 9.664C9.75938 9.72024 9.87879 9.74962 10 9.74962C10.1212 9.74962 10.2406 9.72024 10.348 9.664L20 4.608ZM3.25 2.36051e-08H16.75C17.5556 -9.70147e-05 18.3325 0.298996 18.93 0.839267C19.5276 1.37954 19.9032 2.12248 19.984 2.924L10 8.154L0.016 2.924C0.0935234 2.15431 0.44305 1.43752 1.00175 0.902463C1.56045 0.367409 2.29168 0.049187 3.064 0.00500014L3.25 2.36051e-08H16.75H3.25Z" fill="#6E757C"/>
					</svg>	
					info@autoservisas.lt</a>
				</div>
				<div class="row header-menu-row">
					<nav class="navbar navbar-expand-lg navbar-light menu-list-nav" role="navigation">
						<button class="navbar-toggler anibutton-button" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse-1"
								aria-controls="navbarSupportedContent23" aria-expanded="false" aria-label="Toggle navigation">
							<div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
						</button>
						<?php
							wp_nav_menu( array(
							'theme_location'    => 'menu-1',
							'depth'             => 3,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'container_id'      => 'bs-navbar-collapse-1',
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker(),
							) );
						?>
					</nav>
				</div>
			</div>
	    </div>
    </header>