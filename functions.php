<?php
/**
 * Developer Theme for WordPress - Functions
 * 
 * @package Developer_Theme_WP
 * @since 1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Define theme constants
 */
define( 'DEVELOPER_THEME_VERSION', '1.0.0' );
define( 'DEVELOPER_THEME_DIR', get_template_directory() );
define( 'DEVELOPER_THEME_URI', get_template_directory_uri() );
define( 'DEVELOPER_THEME_ASSETS', DEVELOPER_THEME_URI . '/assets' );

/**
 * Set up theme defaults and register support for various WordPress features
 */
function developer_theme_setup() {
    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add theme support for title tag
    add_theme_support( 'title-tag' );

    // Add theme support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add support for HTML5 markup
    add_theme_support( 'html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'developer-theme-wp' ),
    ) );

    // Load text domain for translations
    load_theme_textdomain( 'developer-theme-wp', DEVELOPER_THEME_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'developer_theme_setup' );

/**
 * Enqueue styles and scripts
 */
function developer_theme_enqueue_assets() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style( 'bootstrap-css', DEVELOPER_THEME_ASSETS . '/plugins/bootstrap/css/bootstrap.min.css', array(), false, 'all' );

    // Enqueue Font Awesome
    wp_enqueue_style( 'fontawesome-css', DEVELOPER_THEME_ASSETS . '/fontawesome/css/all.min.css', array(), false, 'all' );

    // Enqueue Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic|Montserrat:400,700', array(), false, 'all' );

    // Enqueue GitHub Calendar CSS
    wp_enqueue_style( 'github-calendar-css', DEVELOPER_THEME_ASSETS . '/plugins/github-calendar/dist/github-calendar-responsive.css', array(), false, 'all' );

    // Enqueue GitHub Activity CSS
    wp_enqueue_style( 'github-activity-css', DEVELOPER_THEME_ASSETS . '/plugins/github-activity/src/github-activity.css', array(), false, 'all' );

    // Enqueue Octicons CSS
    wp_enqueue_style( 'octicons-css', 'https://cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css', array(), false, 'all' );

    // Enqueue dark mode CSS
    wp_enqueue_style( 'dark-mode-css', DEVELOPER_THEME_ASSETS . '/plugins/dark-mode-switch/dark-mode.css', array(), false, 'all' );

    // Enqueue main theme CSS
    wp_enqueue_style( 'developer-theme-style', get_stylesheet_uri(), array(), DEVELOPER_THEME_VERSION, 'all' );

    // Enqueue Popper JS (required for Bootstrap)
    wp_enqueue_script( 'popper-js', DEVELOPER_THEME_ASSETS . '/plugins/popper.min.js', array(), false, true );

    // Enqueue Bootstrap JS
    wp_enqueue_script( 'bootstrap-js', DEVELOPER_THEME_ASSETS . '/plugins/bootstrap/js/bootstrap.min.js', array( 'popper-js' ), false, true );

    // Enqueue Vanilla RSS JS
    wp_enqueue_script( 'vanilla-rss-js', DEVELOPER_THEME_ASSETS . '/plugins/vanilla-rss/dist/rss.global.min.js', array(), false, true );

    // Enqueue Dark Mode Switch JS
    wp_enqueue_script( 'dark-mode-switch-js', DEVELOPER_THEME_ASSETS . '/plugins/dark-mode-switch/dark-mode-switch.min.js', array(), false, true );

    // Enqueue GitHub Calendar JS
    wp_enqueue_script( 'github-calendar-js', DEVELOPER_THEME_ASSETS . '/plugins/github-calendar/dist/github-calendar.min.js', array(), false, true );

    // Enqueue Mustache JS (for GitHub Activity)
    wp_enqueue_script( 'mustache-js', '//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js', array(), false, true );

    // Enqueue GitHub Activity JS
    wp_enqueue_script( 'github-activity-js', DEVELOPER_THEME_ASSETS . '/plugins/github-activity/src/github-activity.js', array( 'mustache-js' ), false, true );

    // Enqueue Font Awesome JS
    wp_enqueue_script( 'fontawesome-js', DEVELOPER_THEME_ASSETS . '/fontawesome/js/all.js', array(), false, true );
    wp_script_add_data( 'fontawesome-js', 'defer', true );

    // Enqueue main theme JS
    wp_enqueue_script( 'developer-theme-main', DEVELOPER_THEME_ASSETS . '/js/main.js', array(), DEVELOPER_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'developer_theme_enqueue_assets' );

/**
 * Register widget areas
 */
function developer_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'developer-theme-wp' ),
        'id'            => 'primary-sidebar',
        'description'   => esc_html__( 'Main sidebar', 'developer-theme-wp' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'developer_theme_widgets_init' );

/**
 * Get theme option from customizer
 */
function developer_theme_get_option( $option, $default = '' ) {
    return get_theme_mod( $option, $default );
}

/**
 * Custom excerpt length
 */
function developer_theme_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'developer_theme_excerpt_length' );

/**
 * Custom excerpt more
 */
function developer_theme_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'developer_theme_excerpt_more' );

/**
 * Add custom body classes
 */
function developer_theme_body_class( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }
    return $classes;
}
add_filter( 'body_class', 'developer_theme_body_class' );

/**
 * Display post author details
 */
function developer_theme_author_info() {
    if ( is_single() ) {
        get_template_part( 'template-parts/author-bio' );
    }
}
add_action( 'after_content', 'developer_theme_author_info' );

/**
 * Register WordPress Customizer Settings
 */
function developer_theme_customize_register( $wp_customize ) {
    
    // Social Media Section
    $wp_customize->add_section( 'social_links', array(
        'title'       => __( 'Social Media Links', 'developer-theme-wp' ),
        'priority'    => 30,
    ) );

    $social_links = array(
        'social_twitter'       => __( 'Twitter URL', 'developer-theme-wp' ),
        'social_linkedin'      => __( 'LinkedIn URL', 'developer-theme-wp' ),
        'social_github'        => __( 'GitHub URL', 'developer-theme-wp' ),
        'social_stackoverflow' => __( 'Stack Overflow URL', 'developer-theme-wp' ),
        'social_codepen'       => __( 'CodePen URL', 'developer-theme-wp' ),
    );

    foreach ( $social_links as $setting => $label ) {
        $wp_customize->add_setting( $setting, array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( $setting, array(
            'label'   => $label,
            'section' => 'social_links',
            'type'    => 'url',
        ) );
    }

    // Sidebar Information Section
    $wp_customize->add_section( 'sidebar_info', array(
        'title'       => __( 'Sidebar Information', 'developer-theme-wp' ),
        'priority'    => 30,
    ) );

    $sidebar_info = array(
        'sidebar_location' => __( 'Location', 'developer-theme-wp' ),
        'sidebar_email'    => __( 'Email Address', 'developer-theme-wp' ),
        'sidebar_website'  => __( 'Website URL', 'developer-theme-wp' ),
    );

    foreach ( $sidebar_info as $setting => $label ) {
        $wp_customize->add_setting( $setting, array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( $setting, array(
            'label'   => $label,
            'section' => 'sidebar_info',
            'type'    => 'text',
        ) );
    }

    // Header Contact Section
    $wp_customize->add_section( 'header_contact', array(
        'title'       => __( 'Contact Button', 'developer-theme-wp' ),
        'priority'    => 30,
    ) );

    $wp_customize->add_setting( 'contact_page_url', array(
        'default'           => get_home_url(),
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'contact_page_url', array(
        'label'   => __( 'Contact Page URL', 'developer-theme-wp' ),
        'section' => 'header_contact',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'contact_button_text', array(
        'default'           => __( 'Contact Me', 'developer-theme-wp' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'contact_button_text', array(
        'label'   => __( 'Button Text', 'developer-theme-wp' ),
        'section' => 'header_contact',
        'type'    => 'text',
    ) );

    // Skills Section
    $wp_customize->add_section( 'sidebar_skills_section', array(
        'title'       => __( 'Skills', 'developer-theme-wp' ),
        'priority'    => 35,
    ) );

    $wp_customize->add_setting( 'sidebar_skills_intro', array(
        'default'           => 'Intro about your skills goes here. Keep the list lean and only show your primary skillset.',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'sidebar_skills_intro', array(
        'label'   => __( 'Skills Intro Text', 'developer-theme-wp' ),
        'section' => 'sidebar_skills_section',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'sidebar_skills', array(
        'default'           => json_encode( array(
            array( 'name' => 'Python & Django', 'level' => 96, 'label' => 'Expert' ),
            array( 'name' => 'Javascript & jQuery', 'level' => 94, 'label' => 'Expert' ),
            array( 'name' => 'HTML5, CSS3, SASS & LESS', 'level' => 93, 'label' => 'Expert' ),
            array( 'name' => 'Ruby on Rails', 'level' => 86, 'label' => 'Pro' ),
        ) ),
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'sidebar_skills', array(
        'label'       => __( 'Skills (JSON Format)', 'developer-theme-wp' ),
        'section'     => 'sidebar_skills_section',
        'type'        => 'textarea',
        'description' => __( 'Format: [{"name":"Skill Name","level":95,"label":"Expert"},...]', 'developer-theme-wp' ),
    ) );

    $wp_customize->add_setting( 'sidebar_skills_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'sidebar_skills_link', array(
        'label'   => __( 'Skills Link (GitHub Profile URL)', 'developer-theme-wp' ),
        'section' => 'sidebar_skills_section',
        'type'    => 'url',
    ) );

    // Footer Credits Section
    $wp_customize->add_section( 'footer_credits', array(
        'title'       => __( 'Footer Credits', 'developer-theme-wp' ),
        'priority'    => 30,
    ) );

    $wp_customize->add_setting( 'footer_credit_name', array(
        'default'           => 'Xiaoying Riley',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_credit_name', array(
        'label'   => __( 'Designer Name', 'developer-theme-wp' ),
        'section' => 'footer_credits',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'footer_credit_url', array(
        'default'           => 'https://themes.3rdwavemedia.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'footer_credit_url', array(
        'label'   => __( 'Designer URL', 'developer-theme-wp' ),
        'section' => 'footer_credits',
        'type'    => 'url',
    ) );
}
add_action( 'customize_register', 'developer_theme_customize_register' );
