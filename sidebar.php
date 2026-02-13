<?php
/**
 * Developer Theme - Sidebar Template
 * 
 * @package Developer_Theme_WP
 * @since 1.0.0
 */

?>
<div class="secondary col-lg-4 col-12">
    <!-- Basic Information Section -->
    <aside class="info aside section">
        <div class="section-inner shadow-sm rounded">
            <h2 class="heading sr-only"><?php esc_html_e( 'Basic Information', 'developer-theme-wp' ); ?></h2>
            <div class="content">
                <ul class="list-unstyled">
                    <?php
                    $location = get_theme_mod( 'sidebar_location', 'San Francisco, US' );
                    $email = get_theme_mod( 'sidebar_email', 'contact@website.com' );
                    $website = get_theme_mod( 'sidebar_website', get_home_url() );
                    ?>
                    <?php if ( $location ) : ?>
                        <li><i class="fas fa-map-marker-alt"></i><span class="sr-only"><?php esc_html_e( 'Location:', 'developer-theme-wp' ); ?></span><?php echo esc_html( $location ); ?></li>
                    <?php endif; ?>
                    <?php if ( $email ) : ?>
                        <li><i class="fas fa-envelope"></i><span class="sr-only"><?php esc_html_e( 'Email:', 'developer-theme-wp' ); ?></span><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $website ) : ?>
                        <li><i class="fas fa-link"></i><span class="sr-only"><?php esc_html_e( 'Website:', 'developer-theme-wp' ); ?></span><a href="<?php echo esc_url( $website ); ?>"><?php echo esc_html( $website ); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div><!--//content-->
        </div><!--//section-inner-->
    </aside><!--//aside-->

    <!-- Skills Section -->
    <aside class="skills aside section">
        <div class="section-inner shadow-sm rounded">
            <h2 class="heading"><?php esc_html_e( 'Skills', 'developer-theme-wp' ); ?></h2>
            <div class="content">
                <p class="intro">
                    <?php echo wp_kses_post( get_theme_mod( 'sidebar_skills_intro', 'Intro about your skills goes here. Keep the list lean and only show your primary skillset.' ) ); ?>
                </p>
                
                <div class="skillset">
                    <?php
                    // Get skills from customizer or use default
                    $skills = get_theme_mod( 'sidebar_skills', array(
                        array( 'name' => 'Python & Django', 'level' => 96, 'label' => 'Expert' ),
                        array( 'name' => 'Javascript & jQuery', 'level' => 94, 'label' => 'Expert' ),
                        array( 'name' => 'HTML5, CSS3, SASS & LESS', 'level' => 93, 'label' => 'Expert' ),
                        array( 'name' => 'Ruby on Rails', 'level' => 86, 'label' => 'Pro' ),
                    ) );

                    // If stored as JSON string, decode it
                    if ( is_string( $skills ) ) {
                        $skills = json_decode( $skills, true );
                    }

                    if ( is_array( $skills ) ) {
                        foreach ( $skills as $skill ) {
                            if ( isset( $skill['name'] ) ) {
                                ?>
                                <div class="item">
                                    <h3 class="level-title">
                                        <?php echo esc_html( $skill['name'] ); ?>
                                        <span class="level-label" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="<?php echo esc_attr( isset( $skill['label'] ) ? $skill['label'] : 'Expert' ); ?>">
                                            <i class="fas fa-info-circle"></i><?php echo esc_html( isset( $skill['label'] ) ? $skill['label'] : 'Expert' ); ?>
                                        </span>
                                    </h3>
                                    <div class="level-bar progress">
                                        <div class="progress-bar level-bar-inner" role="progressbar" style="width: <?php echo esc_attr( isset( $skill['level'] ) ? $skill['level'] : 96 ); ?>%" aria-valuenow="<?php echo esc_attr( isset( $skill['level'] ) ? $skill['level'] : 96 ); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div><!--//level-bar-->
                                </div><!--//item-->
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
                <p><a class="more-link" href="<?php echo esc_url( get_theme_mod( 'sidebar_skills_link', '#' ) ); ?>"><i class="fas fa-external-link-alt"></i><?php esc_html_e( 'More on GitHub', 'developer-theme-wp' ); ?></a></p>
            </div><!--//content-->
        </div><!--//section-inner-->
    </aside><!--//section-->

    <!-- Education Section -->
    <aside class="education aside section">
        <div class="section-inner shadow-sm rounded">
            <h2 class="heading"><?php esc_html_e( 'Education', 'developer-theme-wp' ); ?></h2>
            <div class="content">
                <?php
                $education = get_theme_mod( 'sidebar_education', array(
                    array( 'degree' => 'MSc Computer Science', 'university' => 'University College London', 'year' => '2018-2019' ),
                    array( 'degree' => 'BSc Computer Science', 'university' => 'University of Bristol', 'year' => '2014-2018' ),
                ) );

                if ( is_string( $education ) ) {
                    $education = json_decode( $education, true );
                }

                if ( is_array( $education ) ) {
                    foreach ( $education as $edu ) {
                        if ( isset( $edu['degree'] ) ) {
                            ?>
                            <div class="item">
                                <h3 class="title"><i class="fas fa-graduation-cap"></i> <?php echo esc_html( $edu['degree'] ); ?></h3>
                                <h4 class="university">
                                    <?php echo esc_html( isset( $edu['university'] ) ? $edu['university'] : '' ); ?>
                                    <span class="year">(<?php echo esc_html( isset( $edu['year'] ) ? $edu['year'] : '' ); ?>)</span>
                                </h4>
                            </div><!--//item-->
                            <?php
                        }
                    }
                }
                ?>
            </div><!--//content-->
        </div><!--//section-inner-->
    </aside><!--//section-->

    <!-- Languages Section -->
    <aside class="languages aside section">
        <div class="section-inner shadow-sm rounded">
            <h2 class="heading"><?php esc_html_e( 'Languages', 'developer-theme-wp' ); ?></h2>
            <div class="content">
                <ul class="list-unstyled">
                    <?php
                    $languages = get_theme_mod( 'sidebar_languages', array(
                        array( 'name' => 'English', 'level' => 'Native Speaker', 'stars' => 5 ),
                        array( 'name' => 'Spanish', 'level' => 'Professional Proficiency', 'stars' => 4 ),
                    ) );

                    if ( is_string( $languages ) ) {
                        $languages = json_decode( $languages, true );
                    }

                    if ( is_array( $languages ) ) {
                        foreach ( $languages as $lang ) {
                            if ( isset( $lang['name'] ) ) {
                                ?>
                                <li class="item">
                                    <span class="title"><strong><?php echo esc_html( $lang['name'] ); ?>:</strong></span>
                                    <span class="level">
                                        <?php echo esc_html( isset( $lang['level'] ) ? $lang['level'] : '' ); ?>
                                        <br class="visible-sm visible-xs"/>
                                        <?php
                                        $stars = isset( $lang['stars'] ) ? intval( $lang['stars'] ) : 5;
                                        for ( $i = 0; $i < $stars; $i++ ) {
                                            echo '<i class="fas fa-star"></i> ';
                                        }
                                        if ( $stars < 5 ) {
                                            echo '<i class="fas fa-star-half"></i>';
                                        }
                                        ?>
                                    </span>
                                </li><!--//item-->
                                <?php
                            }
                        }
                    }
                    ?>
                </ul>
            </div><!--//content-->
        </div><!--//section-inner-->
    </aside><!--//section-->

    <?php
    // Display dynamic widget area if sidebars are registered
    if ( is_active_sidebar( 'primary-sidebar' ) ) {
        dynamic_sidebar( 'primary-sidebar' );
    }
    ?>
</div><!--//secondary-->
