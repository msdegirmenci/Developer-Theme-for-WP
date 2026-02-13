<?php
/**
 * Developer Theme - Footer Template
 * 
 * @package Developer_Theme_WP
 * @since 1.0.0
 */

?>
    <!-- ******FOOTER****** -->
    <footer class="footer">
        <div class="container text-center">
            <small class="copyright">
                <?php 
                echo wp_kses_post( 
                    sprintf(
                        __( 'Designed with %s by %s for developers', 'developer-theme-wp' ),
                        '<span class="sr-only">love</span><i class="fas fa-heart"></i>',
                        '<a href="' . esc_url( get_theme_mod( 'footer_credit_url', 'https://themes.3rdwavemedia.com' ) ) . '" target="_blank">' . esc_html( get_theme_mod( 'footer_credit_name', 'Xiaoying Riley' ) ) . '</a>'
                    )
                );
                ?>
            </small>
        </div><!--//container-->
    </footer><!--//footer-->

    <?php wp_footer(); ?>
</body>
</html>
