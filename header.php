<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

  <?php wp_head(); ?>
</head>

<?php // declare page variables
	$facebook_url = get_theme_mod('uuatheme_facebook_link');
	$twitter_url = get_theme_mod('uuatheme_twitter_link');
	$youtube_url = get_theme_mod('uuatheme_youtube_link');
	$pinterest_url = get_theme_mod('uuatheme_pinterest_link');
	$instagram_url = get_theme_mod('uuatheme_instagram_link');
	$googleplus_url = get_theme_mod('uuatheme_googleplus_link');
	$uuatheme_header_text = get_theme_mod('uuatheme_header_text');
	$uuatheme_colour_scheme = get_theme_mod('uuatheme_colors');
?>

<body <?php body_class($uuatheme_colour_scheme); ?>>

<div id="skip"><a href="#skipto">Skip to Main Content</a></div>	

<?php get_template_part( 'partials/slide-search' ); ?>

<?php get_template_part( 'partials/slide-location' ); ?>


<div class="row masthead-header">
	<div class="container">
		
		<div class="col-md-7 logo-area">
		<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>">
		<?php if( $logo = get_theme_mod('uuatheme_logo_upload') ) : ?>
			<?php if (is_ssl()) { $logo = str_replace('http://', 'https://', $logo ); } ?>
			<img src="<?php echo esc_url($logo) ?>" alt="<?php bloginfo( 'name' ); ?> Logo">
			<div class="site-title" style="text-indent: -9999px;">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<?php	$description = get_bloginfo( 'description' );
					if ( ! empty( $description ) ) : ?>
					<span class="site-description"><?php echo esc_html( $description ); ?></span>
				<?php endif; ?>
			</div>

		<?php else : ?>

			<img class="default-logo" src="<?php echo get_template_directory_uri();?>/assets/img/UUA-base-logo.png" alt="UUA Logo" />
			<div class="site-title">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<?php	$description = get_bloginfo( 'description' );
					if ( ! empty( $description ) ) : ?>
					<span class="site-description"><?php echo esc_html( $description ); ?></span>
				<?php endif; ?>
			</div>

		<?php endif;?>
		</a>
		</div>

		<div class="col-md-5 header-right">

			<?php get_template_part( 'partials/social-media-icons' ); ?>

	    <?php
	      if (has_nav_menu('utility_navigation')) :
	        wp_nav_menu(array('theme_location' => 'utility_navigation', 'menu_class' => 'nav nav-pills'));
	      endif;
	    ?>
		
		  <?php if (!empty($uuatheme_header_text) ) { ?>
				<div class="header-text-field"><h4><?php echo $uuatheme_header_text; ?></h4></div>
			<?php } ?>
		
		</div>
	</div>
</div>

<header class="banner navbar navbar-default navbar-static-top" role="banner">
	<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
			<span>Menu <i class="fa fa-angle-down"></i></span>
    </button>
  </div>

  <nav class="collapse navbar-collapse" role="navigation">
		<span class="sr-only">Main Navigation</span>
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav'));
      endif;
    ?>
  </nav>
	</div>
</header>


<div id="skipto" class="wrap" tabindex="0" role="document">
	<div class="container">
		<div class="content row">
			
			<?php if(!is_front_page() && function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<div class="col-md-12"><p id="breadcrumbs">','</p></div>');
			} ?>
