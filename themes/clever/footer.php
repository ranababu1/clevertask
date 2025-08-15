    </main><!-- #main-content -->

    <footer class="site-footer">
        <div class="container">
            <?php if (has_nav_menu('footer')) : ?>
                <nav class="footer-navigation">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'depth'         => 1,
                        'container'     => false
                    ]);
                    ?>
                </nav>
            <?php endif; ?>

            <div class="site-info">
                <p>
                    &copy; <?php echo date('Y'); ?> 
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>. 
                    <?php esc_html_e('All rights reserved.', 'clever'); ?>
                </p>
                
                <?php if (get_privacy_policy_url()) : ?>
                    <p class="privacy-policy-link">
                        <a href="<?php echo esc_url(get_privacy_policy_url()); ?>">
                            <?php esc_html_e('Privacy Policy', 'clever'); ?>
                        </a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>