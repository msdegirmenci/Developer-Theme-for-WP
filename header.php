<?php
/**
 * Developer Theme - Header Template
 * 
 * @package Developer_Theme_WP
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="author" content="<?php bloginfo( 'name' ); ?>">
    
    <?php wp_head(); ?>
    
    <?php 
    // Get favicon URL from customizer or use WordPress favicon
    $favicon = get_theme_mod( 'site_icon_url', DEVELOPER_THEME_URI . '/favicon.ico' );
    if ( $favicon ) :
    ?>
        <link rel="shortcut icon" href="<?php echo esc_url( $favicon ); ?>">
    <?php endif; ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- ******HEADER****** -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <?php
                    // Display custom logo or profile image
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        ?>
                        <img class="profile-image img-fluid float-start rounded-circle" src="<?php echo esc_url( DEVELOPER_THEME_ASSETS . '/images/profile.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                        <?php
                    }
                    ?>
                    <div class="profile-content">
                        <h1 class="name"><?php bloginfo( 'name' ); ?></h1>
                        <h2 class="desc"><?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?></h2>
                        
                        <!-- Social Media Links -->
                        <?php
                        $twitter = get_theme_mod( 'social_twitter', '#' );
                        $linkedin = get_theme_mod( 'social_linkedin', '#' );
                        $github = get_theme_mod( 'social_github', '#' );
                        $stackoverflow = get_theme_mod( 'social_stackoverflow', '#' );
                        $codepen = get_theme_mod( 'social_codepen', '#' );
                        ?>
                        <ul class="social list-inline">
                            <?php if ( $twitter !== '#' ) : ?>
                                <li class="list-inline-item"><a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if ( $linkedin !== '#' ) : ?>
                                <li class="list-inline-item"><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a></li>
                            <?php endif; ?>
                            <?php if ( $github !== '#' ) : ?>
                                <li class="list-inline-item"><a href="<?php echo esc_url( $github ); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-github-alt"></i></a></li>
                            <?php endif; ?>
                            <?php if ( $stackoverflow !== '#' ) : ?>
                                <li class="list-inline-item"><a href="<?php echo esc_url( $stackoverflow ); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-stack-overflow"></i></a></li>
                            <?php endif; ?>
                            <?php if ( $codepen !== '#' ) : ?>
                                <li class="list-inline-item last-item"><a href="<?php echo esc_url( $codepen ); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-codepen"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div><!--//profile-->
                </div><!--//col-->
                
                <div class="col-12 col-md-auto">
                    <div class="dark-mode-switch d-flex">
                        <div class="form-check form-switch mx-auto mx-md-0">
                            <input type="checkbox" class="form-check-input me-2" id="darkSwitch" />
                            <label class="custom-control-label" for="darkSwitch"><?php esc_html_e( 'Dark Mode', 'developer-theme-wp' ); ?></label>
                        </div>
                    </div><!--//dark-mode-switch-->
                    
                    <?php
                    $contact_link = get_theme_mod( 'contact_page_url', get_home_url() );
                    $contact_text = get_theme_mod( 'contact_button_text', __( 'Contact Me', 'developer-theme-wp' ) );
                    ?>
                    <a class="btn btn-cta-primary" href="<?php echo esc_url( $contact_link ); ?>"><i class="fas fa-paper-plane"></i> <?php echo esc_html( $contact_text ); ?></a>
                </div><!--//col-->
            </div><!--//row-->
        </div><!--//container-->
    </header><!--//header-->
