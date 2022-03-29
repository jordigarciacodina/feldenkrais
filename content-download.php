<?php
/**
 * Default output for a download via the [download] shortcode
 */

if (!defined('ABSPATH')) {
    exit();
}
// Exit if accessed directly

/** @var DLM_Download $dlm_download */
?>
<div class="download-wrapper">
    <a href="<?php $dlm_download->the_download_link(); ?>">
        <div class="download-text">
            <span class="dashicons dashicons-download"></span><span class="download-title">Descarga: <?php $dlm_download->the_title(); ?></span>
        </div>
    </a>
</div>