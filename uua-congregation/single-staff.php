<?php
/**
 * The template for displaying all single staff members.
 *
 */

get_header(); ?>


	<div class="primary-content col-md-7 col-md-push-2">
	<main id="main" class="main" role="main">

	<?php if (have_posts() ) : ?>		
	<?php while ( have_posts() ) : the_post(); ?>

	<header class="staffer-staff-header">
		<?php 
			// checks for slug and builds path
			if ( get_option ('permalink_structure') ) {

			$pageslug = $stafferoptions['slug'];
			if ( $pageslug == '' ) {
					$pageslug = 'staff';
				}
			$homeurl = esc_url( home_url( '/' ) );
			$basepageurl = $homeurl . $pageslug;
			} else {
			$homeurl = esc_url( home_url( '/' ) );
			$basepageurl = $homeurl . '?post_type=staff';
			}
			$pagetitle = $stafferoptions['ptitle'];
			if ($pagetitle == '' ) {
				$pagetitle = 'Staff';
			}
		?>

		<?php
			// checks for manual mode
			// does not display breadcrumb trail in manual mode
			if ( ! isset ( $stafferoptions['manual_mode'] ) ) { ?>
			<div class="staffer-breadcrumbs">
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php _e ('Home', 'uuatheme'); ?></a> &#8250;
					<a href="<?php echo esc_url ($basepageurl) ; ?>" itemprop="url"><?php echo $pagetitle; ?></a> &#8250;
					<span itemprop="title"><?php the_title(); ?></span>
				</div>
			</div>

		<?php } ?>
		
		<?php 
			echo '<h2>';
			echo the_title();
			if ( get_post_meta ($post->ID,'staffer_staff_title', true) != '' ) {
				echo '<br /><small>';
				echo get_post_meta ($post->ID,'staffer_staff_title', true) . '</small>';
			}
			echo '</h2>';
		?>
		<?php
			echo '<p>';
			// social + contact links
			if ( get_post_meta ($post->ID,'staffer_staff_phone', true) != '' ) {
				$phone = get_post_meta ($post->ID,'staffer_staff_phone', true); ?>
					<span><a href="tel:+1<?php echo get_post_meta ($post->ID,'staffer_staff_phone', true); ?>"><?php echo get_post_meta ($post->ID,'staffer_staff_phone', true); ?></a> &bull; </span>
			<?php }			
			if ( get_post_meta ($post->ID,'staffer_staff_email', true) != '' ) {
				$email = get_post_meta ($post->ID,'staffer_staff_email', true); ?>
				<a href="mailto:<?php echo antispambot($email);?>?Subject=<?php _e('Contact from ', 'uuatheme'); ?><?php bloginfo('name'); ?>" target="_blank">
					<?php echo antispambot($email);?></a>
			<?php }
			echo '</p>';
		?>
	</header>

	<div class="staff-content">
		<?php
			the_post_thumbnail ( 'medium', array ('class' => 'alignright') );
			the_content(); 
		?>
	</div>
	
	<div class="staffer-staff-social-links">
	<?php
	// social + contact links
	if ( get_post_meta ($post->ID,'staffer_staff_fb', true) != '' ) { ?>
		<a href="<?php echo get_post_meta ($post->ID,'staffer_staff_fb', true); ?>" target="_blank">
			<i class="fa fa-facebook fa-lg"></i> </a>
	<?php 
		}
	if ( get_post_meta ($post->ID,'staffer_staff_gplus', true) != '' ) { ?>
		<a href="<?php echo get_post_meta ($post->ID,'staffer_staff_gplus', true); ?>" target="_blank">
			<i class="fa fa-google-plus fa-lg"></i> </a>
	<?php }
	if ( get_post_meta ($post->ID,'staffer_staff_twitter', true) != '' ) { ?>
		<a href="<?php echo get_post_meta ($post->ID,'staffer_staff_twitter', true); ?>" target="_blank">
			<i class="fa fa-twitter fa-lg"></i> </a>
	<?php }
	if ( get_post_meta ($post->ID,'staffer_staff_linkedin', true) != '' ) { ?>
		<a href="<?php echo get_post_meta ($post->ID,'staffer_staff_linkedin', true); ?>" target="_blank">
			<i class="fa fa-linkedin fa-lg"></i> </a>
	<?php }
	if ( get_post_meta ($post->ID,'staffer_staff_email', true) != '' ) {
		$email = get_post_meta ($post->ID,'staffer_staff_email', true); ?>
		<br /><a href="mailto:<?php echo antispambot($email);?>?Subject=<?php _e('Contact from ', 'uuatheme'); ?><?php bloginfo('name'); ?>" target="_blank">
			<?php echo antispambot($email);?> </a>
	<?php }
	if ( get_post_meta ($post->ID,'staffer_staff_website', true) != '' ) {
		$website = get_post_meta ($post->ID,'staffer_staff_website', true); ?>
		<br /><a href="<?php echo get_post_meta ($post->ID,'staffer_staff_website', true); ?>" target="_blank">
			Personal Website </a>
	<?php }
	if ( get_post_meta ($post->ID,'staffer_staff_phone', true) != '' ) {
		$phone = get_post_meta ($post->ID,'staffer_staff_phone', true); ?>
			<br /><span><a href="tel:+1<?php echo get_post_meta ($post->ID,'staffer_staff_phone', true); ?>"><?php echo get_post_meta ($post->ID,'staffer_staff_phone', true); ?></a> </span>
	<?php }
	?>
	</div>

	<?php endwhile; endif; ?>


	</main><!-- #main -->
	</div>

<?php get_sidebar('left'); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>



