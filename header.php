<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'myro' ); ?></a>

	<header id="masthead" class="site-header">
	<nav id="menu" class="navbar navbar-expand-md navbar-light" role="navigation">
		<div class="site-branding navbar-brand">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$myro_description = get_bloginfo( 'description', 'display' );
			if ( $myro_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $myro_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
	data-target="#bs4navbar" aria-controls= "bs4navbar" aria-expanded= "false" aria-label="Toggle navigation">
	<span class= "navbar-toggler-icon"></span>
	</button>
	<?php
	wp_nav_menu([
		'menu' => 'primary',
		'theme_location' => 'primary',
		'container' => 'div',
		'container_id' => 'bs4navbar',
		'container_class' => 'collapse navbar-collapse',
		'menu_id' => 'main-menu',
		'menu_class' => 'navbar-nav ml-auto',
		'depth'		=> 2,
		'fallback_cb'	=>'bs4navwalker::fallback',
		'walker'		=> new bs4navwalker()

	]);
?>
</nav>

<?php the_custom_header_markup(); ?> 
	</header><!-- #masthead -->

	<div id="content" class="site-content row">
