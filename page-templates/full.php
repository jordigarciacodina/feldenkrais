<?php
/**
 * Memberships Starter.
 *
 * This file adds the Full Width page template to the Memberships Starter Theme.
 *
 * Template Name: Full Width
 *
 * @package Memberships Starter
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

add_filter( 'body_class', 'genesis_sample_full_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function genesis_sample_full_body_class( $classes ) {

	$classes[] = 'full-width-page';
	return $classes;

}

// Runs the Genesis loop.
genesis();
