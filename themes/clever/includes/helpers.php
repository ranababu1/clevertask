<?php
/**
 * Clever Theme Helper Functions
 */

if (!function_exists('clever_post_meta')) {
    function clever_post_meta() {
        echo '<div class="post-meta">';
        echo '<span class="post-date">' . get_the_date() . '</span>';
        echo '</div>';
    }
}

if (!function_exists('clever_read_more_link')) {
    function clever_read_more_link() {
        echo '<a href="' . esc_url(get_permalink()) . '" class="read-more">';
        echo esc_html__('Read More', 'clever');
        echo '</a>';
    }
}