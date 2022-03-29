<?php
/**
 * Feldenkrais.
 *
 * This file adds the 494 page template to the Feldenkrais Theme.
 *
 * @package Feldenkrais
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

// Remove default loop.
remove_action('genesis_loop', 'genesis_do_loop');

add_action('genesis_loop', 'genesis_404');
/**
 * This function outputs a 404 "Not Found" error message.
 *
 * @since 1.6
 */
function genesis_404()
{
    genesis_markup(array(
        'open' => '<article class="entry">',
        'context' => 'entry-404'
    ));

    genesis_markup(array(
        'open' => '<h1 %s>',
        'close' => '</h1>',
        'content' => apply_filters(
            'genesis_404_entry_title',
            __('Error 404', 'genesis')
        ),
        'context' => 'entry-title'
    ));

    echo '<div class="entry-content">';

    if (genesis_html5()):
        /* translators: %s: URL for current website. */
        echo apply_filters(
            'genesis_404_entry_content',
            '<p>' .
                sprintf(
                    __(
                        'Sí, este es el típico error 404 que a menudo encontramos navegando por la red. Sin embargo, no te preocupes, puedes encontrar lo que buscas en el formulario de aquí abajo.',
                        'genesis'
                    ),
                    trailingslashit(home_url())
                ) .
                '</p>'
        );

        get_search_form(); /* translators: %s: URL for current website. */
    else:
         ?>

		<p><?php printf(
      __(
          'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it with the information below.',
          'genesis'
      ),
      esc_url(trailingslashit(home_url()))
  ); ?></p>

	<?php
    endif;

    echo '</div>';

    genesis_markup(array(
        'close' => '</article>',
        'context' => 'entry-404'
    ));
}

genesis();
