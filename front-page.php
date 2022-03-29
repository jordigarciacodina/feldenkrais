<?php
/**
 * Feldenkrais.
 *
 * This file adds the front template to the Feldenkrais Theme.
 *
 * @package Feldenkrais
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

// Add custom body classes
add_filter( 'body_class', 'bs_add_custom_body_classes');
function bs_add_custom_body_classes( $classes ) {
	$classes[] = 'super-full-width-page';
    if (bs_has_user_purchased_specific_product()):
		$classes[] = 'edd-active';
	endif;

	return $classes;
	
}

// Display Front Page Sections
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bs_display_front_page_sections');
function bs_display_front_page_sections() {
    if (!bs_has_user_purchased_specific_product() /* !rcp_user_has_active_membership() !pmpro_hasMembershipLevel('1') */): ?>

	<section class="hero">
		<div class="wrap">
			<div class="box">
				<h1><?php echo get_theme_mod('hero_title'); ?></h1>
				<p><?php echo get_theme_mod('hero_description'); ?></p>
				<div class="cta">
					<button class="primary" onclick="window.location.href='<?php echo get_theme_mod('hero_primary_cta_link'); ?>'"><?php echo get_theme_mod('hero_primary_cta_text'); ?></button>
				</div>
			</div>
		</div>
	</section>
	<section class="featureds">
		<div class="wrap">
			<div class="row">
				<div class="box">
					<p><?php echo get_theme_mod('featured_description_1'); ?></p>
				</div>
				<div class="box">
					<p><?php echo get_theme_mod('featured_description_2'); ?></p>
				</div>
				<div class="box">
					<p><?php echo get_theme_mod('featured_description_3'); ?></p>
				</div>
				<div class="box">
					<p><?php echo get_theme_mod('featured_description_4'); ?></p>
				</div>
			</div>
		</div>
	</section>
	<?php else: ?>
	<section class="hero">
		<div class="wrap">
			<div class="box">
				<h1><?php echo get_theme_mod('hero_loggedin_title'); ?></h1>
				<p><?php echo get_theme_mod('hero_loggedin_description'); ?></p>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<section class="posts-loop clases">
		<div class="wrap">
			<h3><?php echo get_theme_mod('clases_content_title'); ?></h3>
			<div class="posts-wrapper"> 
			
			<?php global $post;

			$args = array(
				'posts_per_page' 	=> 3,
				'post_type' 		=> 'lesson',
				'order' 			=> 'DESC'
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
			setup_postdata($post); ?>
				<a href="<?php the_permalink(); ?>">
					<article class="clase">
						<header class="entry-header">
							<?php the_post_thumbnail(); ?>
						</header>
						<div class="entry-content">
							<h2 class="entry-title"><?php the_title(); ?></h2>
						</div>
					</article>
				</a><?php

   			endforeach;
   			wp_reset_postdata();?>

			</div>
			<div class="cta">
				<button onclick="window.location.href='<?php echo get_theme_mod('clases_content_cta_link'); ?>'"><?php echo get_theme_mod('clases_content_cta_text'); ?></button>
			</div>
		</div>
	</section>
	<section class="posts-loop cursos">
		<div class="wrap">
			<h3><?php echo get_theme_mod('cursos_content_title'); ?></h3>
			<div class="posts-wrapper"> 
			
			<?php global $post;

			$args = array(
				'posts_per_page' 	=> 3,
				'post_type' 		=> 'course',
				'order' 			=> 'DESC'
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
			setup_postdata($post); ?>
				<a href="<?php the_permalink(); ?>">
					<article class="curso">
						<header class="entry-header">
							<?php the_post_thumbnail(); ?>
						</header>
						<div class="entry-content">
							<h2 class="entry-title"><?php the_title(); ?></h2>
						</div>
					</article>
				</a><?php

   			endforeach;
   			wp_reset_postdata();?>

			</div>
			<div class="cta">
				<button onclick="window.location.href='<?php echo get_theme_mod('cursos_content_cta_link'); ?>'"><?php echo get_theme_mod('cursos_content_cta_text'); ?></button>
			</div>
		</div>
	</section>
	<section class="posts-loop recurso">
		<div class="wrap">
			<h3><?php echo get_theme_mod('recursos_content_title'); ?></h3>
			<div class="posts-wrapper"> 
			
			<?php global $post;

			$args = array(
				'posts_per_page' 	=> 3,
				'post_type' 		=> 'recurso',
				'order' 			=> 'DESC'
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
			setup_postdata($post); ?>
				<a href="<?php the_permalink(); ?>">
					<article class="recurso">
						<header class="entry-header">
							<?php the_post_thumbnail(); ?>
						</header>
						<div class="entry-content">
							<h2 class="entry-title"><?php the_title(); ?></h2>
						</div>
					</article>
				</a><?php

   			endforeach;
   			wp_reset_postdata();?>

			</div>
			<div class="cta">
				<button onclick="window.location.href='<?php echo get_theme_mod('recursos_content_cta_link'); ?>'"><?php echo get_theme_mod('recursos_content_cta_text'); ?></button>
			</div>
		</div>
	</section>
    <?php if (!bs_has_user_purchased_specific_product()): ?>
	<section class="testimonials">
		 <div class="wrap">
		 	<h3><?php echo get_theme_mod('testimonios_content_title'); ?></h3>
			<div class="testimonials-wrapper">
				<div class="row"><?php
					$content = get_post_field( 'post_content', 213);
						if ( ! $content ) {
							return;
						}
					echo $content; ?>
				</div>
			</div>
			<div class="cta">
				<button class="primary" onclick="window.location.href='<?php echo get_theme_mod('testimonios_content_cta_link'); ?>'"><?php echo get_theme_mod('testimonios_content_cta_text'); ?></button>
			</div>
		</div>
	</section> 
	<?php else: ?>

	<?php endif;

}

genesis();
