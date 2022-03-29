<?php
/**
 * Memberships Starter.
 *
 * This file adds the checkout page template to the Memberships Starter Theme.
 *
 * Template Name: Checkout
 *
 * @package Memberships Starter
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

add_filter( 'body_class', 'genesis_sample_checkout_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function genesis_sample_checkout_body_class( $classes ) {

	$classes[] = 'checkout-page';
	return $classes;

}

// Removes Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

add_action( 'wp_enqueue_scripts', 'genesis_sample_dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 1.0.0
 */
function genesis_sample_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

// Removes navigation.
remove_theme_support( 'genesis-menus' );
remove_theme_support( 'social-menu' );

// Removes site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

// Runs the Genesis loop.
genesis();
