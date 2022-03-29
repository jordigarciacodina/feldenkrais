<?php
/**
 * Memberships Starter theme.
 *
 * Theme supports.
 *
 * @package Memberships Starter
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

return [
	'genesis-custom-logo'             => [
		'height'      => 120,
		'width'       => 700,
		'flex-height' => true,
		'flex-width'  => true,
	],
	'html5'                           => [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		'script',
		'style',
	],
	'genesis-accessibility'           => [
		'drop-down-menu',
		'headings',
		'search-form',
		'skip-links',
	],
	'genesis-lazy-load-images'        => '',
	'genesis-after-entry-widget-area' => '',
	'genesis-footer-widgets'          => 4,
	'genesis-menus'                   => [
		'primary'   	=> __( 'Header Menu', 'genesis-sample' ),
		'secondary' 	=> __( 'Footer Menu', 'genesis-sample' ),
		'nonmembers'   	=> __( 'Non Members', 'genesis-sample' ),
		'members' 		=> __( 'Members', 'genesis-sample' ),
	],
];
