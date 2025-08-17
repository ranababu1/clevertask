<?php
namespace Simple_Logo_Slider;

class Slider_Shortcode {
    public function __construct() {
        add_shortcode('logo_slider', [$this, 'render_shortcode']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function enqueue_assets() {
        wp_register_style(
            'sls-styles',
            SLS_PLUGIN_URL . 'assets/css/sls-styles.css',
            [],
            SLS_PLUGIN_VERSION
        );

        wp_register_script(
            'sls-script',
            SLS_PLUGIN_URL . 'assets/js/sls-script.js',
            [],
            SLS_PLUGIN_VERSION,
            true
        );
    }

    public function render_shortcode($atts) {
    wp_enqueue_style('sls-styles');
    wp_enqueue_script('sls-script');

    $atts = shortcode_atts([
        'speed' => '20s',
        'gap'   => '30px',
        'width' => '200px'
    ], $atts, 'logo_slider');

    $args = [
        'post_type'      => 'sls_carousel',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC'
    ];

    $query = new \WP_Query($args);
    
    if (!$query->have_posts()) {
        return '';
    }

    ob_start();
    ?>
    <section class="sls-logo-slider-section">
    <div class="sls-logo-slider" 
         data-speed="<?php echo esc_attr($atts['speed']); ?>"
         data-gap="<?php echo esc_attr($atts['gap']); ?>"
         data-width="<?php echo esc_attr($atts['width']); ?>">
         <h2 class="sls-logo-h2">MADE TO SCALE WITH COMPANIES OF ALL SIZES</h2>
        <div class="sls-slider-track">
            <?php 
            while ($query->have_posts()) : $query->the_post();
                if (has_post_thumbnail()) : ?>
                    <div class="sls-slide">
                        <?php the_post_thumbnail('medium', [
                            'loading' => 'lazy',
                            'alt'     => get_the_title()
                        ]); ?>
                    </div>
                <?php endif;
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
    </section>
    <?php
    return ob_get_clean();
}
}