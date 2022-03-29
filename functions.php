<?php
/**
 * Memberships Starter.
 *
 * This file adds functions to the Memberships Starter Theme.
 *
 * @package Memberships Starter
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function genesis_sample_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style(
        'font-awesome-free',
        '//use.fontawesome.com/releases/v5.3.1/css/all.css'
    );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}

}

add_action( 'after_setup_theme', 'genesis_sample_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'genesis_sample_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

// Adds image sizes.
add_image_size('genesis-grid', 700, 350, true);
add_image_size( 'genesis-singular-images', 702, 526, true );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout('content-sidebar');
genesis_unregister_layout('sidebar-content');
genesis_unregister_layout('content-sidebar-sidebar');
genesis_unregister_layout('sidebar-content-sidebar');
genesis_unregister_layout('sidebar-sidebar-content');

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5);

add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

// Add Members Menu
add_action( 'genesis_header', 'bs_members_menu', 12 );
function bs_members_menu() {

    if ( ! genesis_nav_menu_supported( 'members' ) || ! has_nav_menu( 'members' ) ) {
        return;
    }
 
    $class = 'menu genesis-nav-menu genesis-responsive-menu';
    if ( genesis_superfish_enabled() ) {
        $class .= ' js-superfish';
    }

    genesis_nav_menu( array(
        'theme_location' => is_user_logged_in() ? 'members' : 'nonmembers',
        'menu_class'     => $class,
    ) );

}

// Add logout item to Primary Menu
add_filter( 'wp_nav_menu_items', 'bs_logout_menu_link', 10, 2 );
function bs_logout_menu_link( $items, $args ) {
	if ($args->theme_location == 'members') :
		$items .= '<li class="menu-item"><a href="'. wp_logout_url() .'"><span itemprop="name">'. __("Log Out") .'</span></a></li>';
	else:

	endif;

   return $items;
}

// Define is_child() function
function is_child($pageID) {
    global $post;
    if (is_page() && $post->post_parent == $pageID) {
        return true;
    } else {
        return false;
    }
}

// Register intranet menu
add_action('init', 'bs_register_intranet_menu');
function bs_register_intranet_menu() {
    register_nav_menu('intranet-menu', __('Intranet menu'));
}

// Hooking intranet menu ('ID of Intranet page')
add_action('genesis_before_content', 'bs_hooking_intranet_menu');
function bs_hooking_intranet_menu() {
    if (is_page('92') || is_child('92')):// Modificar ID's ?>
		<div class="entry-header"><h1 class="entry-title intranet-title"><?php echo the_title(); ?></h1></div>
		<?php wp_nav_menu(
			array(
      			'theme_location'  => 'intranet-menu',
				'menu_class' 	  => 'genesis-nav-menu'
  			)
		);
		remove_action('genesis_entry_header', 'genesis_do_post_title');
	endif;

}

// Register social menu
add_action('init', 'bs_register_social_menu');
function bs_register_social_menu() {
    register_nav_menu('social-menu', __('Social menu'));
}

// Hooking Social menu
add_action('genesis_footer', 'bs_hooking_social_menu', 10);
function bs_hooking_social_menu() {
    if (!is_page_template(array('landing.php', 'checkout.php'))):
        wp_nav_menu(
			array(      			
				'theme_location'  => 'social-menu',
				'menu_class' 	  => 'genesis-nav-menu'
			)
		);
    endif;
}

// Register Filter menu
add_action('init', 'bs_register_filter_menu');
function bs_register_filter_menu() {
    register_nav_menu('filter-menu', __('Filter menu'));
}

// Colocamos el nombre del field en placeholder
add_filter('comment_form_default_fields', 'bs_comment_form_fields');
function bs_comment_form_fields($fields) {
    foreach ($fields as &$field) {
        $field = str_replace(
            'id="author"',
            'id="author" placeholder="Nombre *"',
            $field
        );
        $field = str_replace(
            'id="email"',
            'id="email" placeholder="Email *"',
            $field
        );
        $field = str_replace(
            'id="url"',
            'id="url" placeholder="Web *"',
            $field
        );
    }
    return $fields;
}

// Colocamos el nombre el field en placeholder
add_filter('comment_form_defaults', 'bs_comment_textarea_placeholder');
function bs_comment_textarea_placeholder($args) {
    $args['comment_field'] = str_replace(
        'textarea',
        'textarea placeholder="Comentario *"',
        $args['comment_field']
    );
    return $args;
}

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');

// Custom Blog & Archives template
add_action('genesis_before_while', 'bs_add_costumize_archive_templates');
function bs_add_costumize_archive_templates() {
	if (is_home() || is_archive() || is_search()): ?>
	
		<div class="posts-wrapper"> <?php

		// Reposition Genesis featured image
		remove_action('genesis_entry_content', 'genesis_do_post_image', 8);
		add_action('genesis_entry_header', 'genesis_do_post_image', 1);

		// Reposition Genesis post title
		remove_action('genesis_entry_header', 'genesis_entry_header_markup_open', 5);
		remove_action('genesis_entry_header', 'genesis_do_post_title');
		remove_action('genesis_entry_header', 'genesis_entry_header_markup_close', 15);
		add_action('genesis_entry_content', 'genesis_do_post_title', 9);

 	endif;
}

add_action('genesis_before_while', 'bs_add_post_wrapper_after', 9);
function bs_add_post_wrapper_after() {
	if (is_home() || is_archive() || is_search()): ?>
	
		</div>

	<?php endif;
}

// Repsoition Pagination
remove_action('genesis_after_endwhile', 'genesis_posts_nav');
add_action('genesis_after_content_sidebar_wrap', 'genesis_posts_nav');

// Reposition Genesis post title
add_action('genesis_before_while', 'bs_add_costumize_single_templates');
function bs_add_costumize_single_templates() {
	if (is_single()):
		
		// Reposition Genesis post title
		remove_action('genesis_entry_header', 'genesis_entry_header_markup_open', 5);
		remove_action('genesis_entry_header', 'genesis_do_post_title');
		remove_action('genesis_entry_header', 'genesis_entry_header_markup_close', 15);
		add_action('genesis_entry_content', 'genesis_do_post_title', 9);
			
    endif;
}

// Display CTA Section
add_action('genesis_before_footer','bs_display_cta_section', 5);
function bs_display_cta_section() { 
	if(!bs_has_user_purchased_specific_product() && !is_page_template(array('page-templates/landing.php', 'page-templates/checkout.php')) ) : ?>
		<section class="hero hero-bottom">
			<div class="wrap">
				<div class="box">
					<h1><?php echo get_theme_mod('hero_title'); ?></h1>
					<div class="benefits">
						<div class="benefit">
							<i class=" <?php echo get_theme_mod('hero_benefit_1_icon'); ?>" aria-hidden="true"></i>
							<p><?php echo get_theme_mod('hero_benefit_1_text'); ?></p>
						</div>
						<div class="benefit">
							<i class=" <?php echo get_theme_mod('hero_benefit_1_icon'); ?>" aria-hidden="true"></i>
							<p><?php echo get_theme_mod('hero_benefit_2_text'); ?></p>
						</div>
						<div class="benefit">
							<i class=" <?php echo get_theme_mod('hero_benefit_1_icon'); ?>" aria-hidden="true"></i>
							<p><?php echo get_theme_mod('hero_benefit_3_text'); ?></p>
						</div>
					</div>
					<div class="cta">
						<button class="primary" onclick="window.location.href='<?php echo get_theme_mod('hero_primary_cta_link'); ?>'"><?php echo get_theme_mod('hero_primary_cta_text'); ?></button>
					</div>
				</div>
			</div>
		</section> <?php
	endif;

}
