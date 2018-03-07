<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Template_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header container-1200">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
				<h1 class="site-header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		</div><!-- .site-branding -->

		<div class="site-header__form">
			<div class="site-header__input-container">
				<!-- <input type="text" class="site-header__form-input" placeholder="Search for a person or a thing..." autofocus="autofocus"> -->
				<?php get_search_form(); ?>
				<!-- <div class="site-header__search-button"><i class="fa fa-search" aria-hidden="true"></i></div> -->
			</div>
		</div>

		<!-- Search overlay -->
		<div class="search-overlay">
			<div class="search-overlay__top">
				<i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
			</div>
			<div class="search-overlay__results">

			</div>
		</div>

		<nav id="site-navigation" class="site-header__navigation">
			<ul class="main-navigation">
				<li class="main-navigation--non-register"><a href="<?php echo site_url(). '/#how-it-works' ?>">How does it work?</a></li>
				<li class="btn btn--small btn--blue user-registration-links__register"><a href="<?php echo site_url('/wp-login.php?action=register&redirect_to=' . get_permalink()); ?>">Register</a></li>
				<li class="user-registration-links__login"><a class="btn btn--small btn--green" href="<?php echo wp_login_url(); ?>">Login</a></li>
				<li class="user-registration-links__logout user-registration-links__logout--hidden"><a class="btn btn--small btn--blue" href="#">Logout</a></li>
			</ul>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
