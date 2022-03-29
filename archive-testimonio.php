
<?php

/**
 * Feldenkrais.
 *
 * This file adds the Testimonio archive template to the Feldenkrais Theme.
 *
 * @package Feldenkrais
 * @author  Bicicleta Studio
 * @license GPL-2.0+
 * @link    https://bicicleta.studio
 */

// Display Testimonio Archive Content
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action('genesis_loop','bs_display_testimonio_archive_content');
function bs_display_testimonio_archive_content() { ?>

	<div class="testimonials-wrapper"> 
				
	<?php global $post;
	
	$args = array(
		'posts_per_page' 	=> -1,
		'post_type' 		=> 'testimonio',
		'orderby' 			=> 'rand'
	);
	
	$myposts = get_posts($args);
	
	foreach ($myposts as $post):
	setup_postdata($post); ?>
		<article class="testimonio">
			<header class="entry-header">
				<?php the_post_thumbnail(); ?>
			</header>
			<div class="entry-content">
				<?php the_excerpt(); ?>
				<p class="entry-title"><?php the_title(); ?></p>
			</div>
		</article><?php
	endforeach;
	wp_reset_postdata();?>
						
	</div> 

 <?php
    
}

 genesis();