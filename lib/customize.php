<?php
/**
 * Feldenkrais.
 *
 * This file adds the Customizer additions to the Feldenkrais Theme.
 *
 * @package Feldenkrais
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

// Add Hero section to costumizer
add_action('customize_register','genesis_starter_front_page_hero_customize');
function genesis_starter_front_page_hero_customize($wp_customize){

	// Add the section
	$wp_customize->add_section('genesis_starter_hero_section',
		array(
		'title' => __('Hero', 'genesis-starter'),
		'description' => __('Personaliza la sección Hero', 'genesis-starter'),
		'priority' => 50
	));

	// Background Image
	$wp_customize->add_setting('load_hero_image');
	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,
		'load_hero_image',
		array(
			'default' => get_stylesheet_directory_uri() . '/images/hero-back.jpg',
			'label' => __('Imagen de fondo','genesis-starter'),
			'section' => 'genesis_starter_hero_section',
			'settings' => 'load_hero_image'
			
		)
	));

	// Background Image Position
	$wp_customize->add_setting('background_position', 
		array(
		'default' => 'center-center'
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'background_position',
		array(
			'label' => __('Posición de la Background Image','genesis-starter'),
			'section' => 'genesis_starter_hero_section',
			'settings' => 'background_position',
			'type' => 'select',
			'choices' => array(
				'left-top' => __('Izquierda Superior','genesis-starter'),
				'left-center' => __('Izquierda Centrado','genesis-starter'),
				'left-bottom' => __('Izquierda Inferior','genesis-starter'),
				'right-top' => __('Derecha Superior','genesis-starter'),
				'right-center' => __('Derecha Centrado','genesis-starter'),
				'right-bottom' => __('Derecha Inferior','genesis-starter'),
				'center-top' => __('Centrado Superior','genesis-starter'),
				'center-center' => __('Centrado Centrado','genesis-starter'),
				'center-bottom' => __('Centrado Inferior','genesis-starter')
			)
		)
	));
	
	// Title Text
	$wp_customize->add_setting('hero_title',
		array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'hero_title',
		array(
			'label' => __('Texto del título', 'genesis-starter'),
			'section' => 'genesis_starter_hero_section',
			'settings' => 'hero_title',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));
		
	// Description Text
	$wp_customize->add_setting('hero_description',
		array(
		'default' => __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'genesis-starter')
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'hero_description',
		array(
			'label' => __('Texto de la descripción', 'genesis-starter'),
			'section' => 'genesis_starter_hero_section',
			'settings' => 'hero_description',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Logged in Title Text
	$wp_customize->add_setting('hero_loggedin_title',
	array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'hero_loggedin_title',
		array(
			'label' => __('Texto del título logueado', 'genesis-starter'),
			'section' => 'genesis_starter_hero_section',
			'settings' => 'hero_loggedin_title',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));
		
	// Logged in Description Text
	$wp_customize->add_setting('hero_loggedin_description',
		array(
		'default' => __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'genesis-starter')
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'hero_loggedin_description',
		array(
			'label' => __('Texto de la descripción logueado', 'genesis-starter'),
			'section' => 'genesis_starter_hero_section',
			'settings' => 'hero_loggedin_description',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Primary CTA Text
    $wp_customize->add_setting(
    	'hero_primary_cta_text', 
    	array(
        	'default' => __('Lorem ipsum', 'genesis-starter'),
			'type' => 'theme_mod'
    ));
    $wp_customize->add_control(
    	'hero_primary_cta_text',
		array(
        	'label' => __('Texto de CTA Principal', 'genesis-starter'),
			'section' => 'genesis_starter_hero_section',
			'settings' => 'hero_primary_cta_text',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
    ));

    // Primary CTA Link
    $wp_customize->add_setting(
    	'hero_primary_cta_link',
    	array(
        	'default' => home_url('/registro'),
			'type' => 'theme_mod'
    ));
    $wp_customize->add_control(
    	'hero_primary_cta_link', 
    	array(
        	'label' => __('Enlace del CTA', 'genesis-starter'),
			'section' => 'genesis_starter_hero_section',
			'settings' => 'hero_primary_cta_link',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
	));

}

// Add Featureds section to costumizer
add_action('customize_register','genesis_starter_front_page_featureds_customize');
function genesis_starter_front_page_featureds_customize($wp_customize){

	// Add the section
	$wp_customize->add_section('genesis_starter_featureds_section',
		array(
		'title' => __('Destacados', 'genesis-starter'),
		'description' => __('Personaliza la sección Destacados', 'genesis-starter'),
		'priority' => 60
	));
		
	// Description Text
	$wp_customize->add_setting('featured_description_1',
		array(
		'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'genesis-starter')
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'featured_description_1',
		array(
			'label' => __('Descripciónl destacado 1', 'genesis-starter'),
			'section' => 'genesis_starter_featureds_section',
			'settings' => 'featured_description_1',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));
		
	// Description Text
	$wp_customize->add_setting('featured_description_2',
		array(
		'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'genesis-starter')
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'featured_description_2',
		array(
			'label' => __('Descripción destacado 2', 'genesis-starter'),
			'section' => 'genesis_starter_featureds_section',
			'settings' => 'featured_description_2',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Description Text
	$wp_customize->add_setting('featured_description_3',
		array(
		'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'genesis-starter')
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'featured_description_3',
		array(
			'label' => __('Descripción del destacado 3', 'genesis-starter'),
			'section' => 'genesis_starter_featureds_section',
			'settings' => 'featured_description_3',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));
		
	// Description Text
	$wp_customize->add_setting('featured_description_4',
		array(
		'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'genesis-starter')
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'featured_description_4',
		array(
			'label' => __('Descripción del destacado 4', 'genesis-starter'),
			'section' => 'genesis_starter_featureds_section',
			'settings' => 'featured_description_4',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));
		
}

// Add Content section to costumizer
add_action('customize_register','genesis_starter_front_page_content_customize');
function genesis_starter_front_page_content_customize($wp_customize){

	// Add the section
	$wp_customize->add_section('genesis_starter_content_section',
		array(
		'title' => __('Contenido', 'genesis-starter'),
		'description' => __('Personaliza la sección Contenido', 'genesis-starter'),
		'priority' => 60
	));

	// Clases Content Title Text
	$wp_customize->add_setting('clases_content_title',
	array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'clases_content_title',
		array(
			'label' => __('Título de la sección de Clases', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'clases_content_title',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Clases Content CTA Text
	$wp_customize->add_setting('clases_content_cta_text',
		array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'clases_content_cta_text',
		array(
			'label' => __('Texto del CTA de los Clases', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'clases_content_cta_text',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Clases Content CTA Link
	$wp_customize->add_setting(
		'clases_content_cta_link', 
		array(
			'default' => __('Lorem ipsum', 'genesis-starter'),
			'type' => 'theme_mod'
	));
	$wp_customize->add_control(
		'clases_content_cta_link',
		array(
			'label' => __('Enlace del CTA de los Clases', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'clases_content_cta_link',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
	));

	// Recursos Content Title Text
	$wp_customize->add_setting('recursos_content_title',
	array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'recursos_content_title',
		array(
			'label' => __('Título de la sección de Recursos', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'recursos_content_title',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Recursos Content CTA Text
	$wp_customize->add_setting('recursos_content_cta_text',
		array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'recursos_content_cta_text',
		array(
			'label' => __('Texto del CTA de los Recursos', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'recursos_content_cta_text',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Recursos Content CTA Link
	$wp_customize->add_setting(
		'recursos_content_cta_link', 
		array(
			'default' => __('Lorem ipsum', 'genesis-starter'),
			'type' => 'theme_mod'
	));
	$wp_customize->add_control(
		'recursos_content_cta_link',
		array(
			'label' => __('Enlace del CTA de los Recursos', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'recursos_content_cta_link',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
	));

	// Cursos Content Title Text
	$wp_customize->add_setting('cursos_content_title',
	array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'cursos_content_title',
		array(
			'label' => __('Título de la sección de Cursos', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'cursos_content_title',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Cursos Content CTA Text
	$wp_customize->add_setting('cursos_content_cta_text',
		array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'cursos_content_cta_text',
		array(
			'label' => __('Texto del CTA de los Cursos', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'cursos_content_cta_text',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Cursos Content CTA Link
	$wp_customize->add_setting(
		'cursos_content_cta_link', 
		array(
			'default' => __('Lorem ipsum', 'genesis-starter'),
			'type' => 'theme_mod'
	));
	$wp_customize->add_control(
		'cursos_content_cta_link',
		array(
			'label' => __('Enlace del CTA de los Cursos', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'cursos_content_cta_link',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
	));

	// Testimonios Content Title Text
	$wp_customize->add_setting('testimonios_content_title',
	array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'testimonios_content_title',
		array(
			'label' => __('Título de la sección de Testimonios', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'testimonios_content_title',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Testimonios Content CTA Text
	$wp_customize->add_setting('testimonios_content_cta_text',
		array(
		'default' => __('Lorem ipsum dolor sit amet', 'genesis-starter')
		)
	);

	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'testimonios_content_cta_text',
		array(
			'label' => __('Texto del CTA de los Testimonios', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'testimonios_content_cta_text',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
		)
	));

	// Testimonios Content CTA Link
	$wp_customize->add_setting(
		'testimonios_content_cta_link', 
		array(
			'default' => __('Lorem ipsum', 'genesis-starter'),
			'type' => 'theme_mod'
	));
	$wp_customize->add_control(
		'testimonios_content_cta_link',
		array(
			'label' => __('Enlace del CTA de los Testimonios', 'genesis-starter'),
			'section' => 'genesis_starter_content_section',
			'settings' => 'testimonios_content_cta_link',
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text'
	));

}

// Apply Customizations
add_action('wp_head','genesis_starter_front_page_hero_customize_css');
function genesis_starter_front_page_hero_customize_css(){
	
 $header_image = get_theme_mod('load_hero_image');
 $background_position = get_theme_mod('background_position');
 $background_position = str_replace('-',' ',$background_position);
 
?>

<style type="text/css">
	<?php if($header_image != ""): ?>

	@media only screen and (min-width: 960px) {
		.hero:not(.banner-bottom) {
			background-image: url(<?php echo $header_image; ?>);
			background-position: <?php echo $background_position; ?>;
			background-size: cover;
			background-repeat: no-repeat;
		}
	}

	<?php endif; ?>

</style> <?php

}