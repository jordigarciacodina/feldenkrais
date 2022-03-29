<?php
/**
 * Memberships Starter child theme.
 *
 * @package Memberships Starter
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

/**
 * Genesis responsive menus settings. (Requires Genesis 3.0+.)
 */

return array(
	'script' => array(
		'mainMenu'         => __( '', 'genesis-sample' ),
		'menuClasses' => array(
			'others' => array( 
				'.nav-nonmembers', 
				'.nav-members'
			),
		),
	),
	'extras' => array(
		'media_query_width' => '960px',
	),
);
