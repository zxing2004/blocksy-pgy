<?php
/**
 * Blocksy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blocksy
 */

if (version_compare(PHP_VERSION, '5.7.0', '<')) {
	require get_template_directory() . '/inc/php-fallback.php';
	return;
}

require get_template_directory() . '/inc/init.php';

// 在文章内容末尾显示文章链接
add_filter('the_content', 'add_post_permalink_to_content');
function add_post_permalink_to_content($content) {
    if (is_single() && in_the_loop() && is_main_query()) {
        $permalink = get_permalink();
        $link_html = '<div class="post-permalink" style="margin-top: 20px; padding: 10px; background: #f5f5f5; border-left: 3px solid #0073aa;">';
        $link_html .= '<strong>本文链接：</strong>';
        $link_html .= '<a href="' . esc_url($permalink) . '" target="_blank">' . esc_html($permalink) . '</a>';
        $link_html .= '</div>';
        $content .= $link_html;
    }
    return $content;
}
