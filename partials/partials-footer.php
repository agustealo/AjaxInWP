    </div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info">
            <?php
            $footer_text = get_theme_mod('ajaxinwp_footer_text', '');
            if (!empty($footer_text)) {
                echo '<span class="footer-text">' . esc_html($footer_text) . '</span>';
            } else {
                echo '<a href="' . esc_url(__('https://wordpress.org/', 'ajaxinwp')) . '">' . sprintf(esc_html__('Proudly powered by %s', 'ajaxinwp'), 'WordPress') . '</a>';
            }
            ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
