<?php
/**
 * Feldenkrais.
 *
 * This file adds the single template to the Feldenkrais Theme.
 *
 * @package Feldenkrais
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

// Add related pacs after content based on categories
add_action('genesis_after_entry_content', 'bs_related_lessons');
function bs_related_lessons() {
    if (is_singular(array('curso', 'leccion'))) { ?>

        <aside class="related-lessons">
            <h3><?php _e('Todas las clases de este curso', 'bs'); ?></h3>
            <div class="wrap"> <?php

            global $post;

            $cats = wp_get_post_categories($post->ID);
            $catIDs = array();
            
            foreach ($cats as $cat) {
                $catIDs[] = $cat;
            }

            $args = array(
                'category__in'          => $catIDs,
                'post_type'             => 'leccion',
                'category__not_in'      => 1,
                'showposts'             => -1,
                'ignore_sticky_posts'   => 0,
                'order'                 => 'ASC'
            );

            $home_query = new WP_Query($args);

            if ($home_query->have_posts()):
                while ($home_query->have_posts()):
                    $home_query->the_post(); ?>
                    <div class="lesson">
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?></p>
                        </a>
                    </div><?php
                endwhile;
                wp_reset_postdata();
            endif; ?>

            </div>
        </aside>
	
    <?php }
    
}

genesis();
