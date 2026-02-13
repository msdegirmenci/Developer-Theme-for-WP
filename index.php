<?php
/**
 * Developer Theme - Main Template
 * 
 * @package Developer_Theme_WP
 * @since 1.0.0
 */

get_header();
?>

<div class="container sections-wrapper py-5">
    <div class="row">
        <div class="primary col-lg-8 col-12">
            
            <!-- About Section -->
            <section class="about section">
                <div class="section-inner shadow-sm rounded">
                    <h2 class="heading"><?php esc_html_e( 'About Me', 'developer-theme-wp' ); ?></h2>
                    <div class="content">
                        <?php
                        $about_text = get_theme_mod( 'front_page_about', 'Write a brief intro about yourself. It\'s a good idea to include your personal interests and hobbies as well. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.' );
                        echo wp_kses_post( $about_text );
                        ?>
                    </div><!--//content-->
                </div><!--//section-inner-->
            </section><!--//section-->

            <!-- Latest Projects Section -->
            <section class="latest section">
                <div class="section-inner shadow-sm rounded">
                    <h2 class="heading"><?php esc_html_e( 'Latest Projects', 'developer-theme-wp' ); ?></h2>
                    <div class="content">
                        <?php
                        /**
                         * Display latest projects from custom post type or posts
                         */
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 5,
                            'post_status'    => 'publish',
                        );

                        $projects_query = new WP_Query( $args );

                        if ( $projects_query->have_posts() ) {
                            $count = 0;
                            while ( $projects_query->have_posts() ) {
                                $projects_query->the_post();
                                $count++;

                                if ( $count === 1 ) {
                                    // Featured project
                                    ?>
                                    <div class="item featured text-center">
                                        <div class="featured-image has-ribbon">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail( 'full', array( 'class' => 'img-fluid project-image rounded shadow-sm' ) );
                                                } else {
                                                    ?>
                                                    <img class="img-fluid project-image rounded shadow-sm" src="<?php echo esc_url( DEVELOPER_THEME_ASSETS . '/images/projects/project-featured.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" />
                                                    <?php
                                                }
                                                ?>
                                            </a>
                                            <div class="ribbon">
                                                <div class="text"><?php esc_html_e( 'New', 'developer-theme-wp' ); ?></div>
                                            </div>
                                        </div>

                                        <h3 class="title mb-3">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="desc text-start">
                                            <?php the_excerpt(); ?>
                                        </div><!--//desc-->
                                        <a class="btn btn-cta-secondary" href="<?php the_permalink(); ?>"><i class="fas fa-thumbs-up"></i> <?php esc_html_e( 'View Project', 'developer-theme-wp' ); ?></a>
                                    </div><!--//item-->
                                    <hr class="divider" />
                                    <?php
                                } else {
                                    // Other projects
                                    ?>
                                    <div class="item row">
                                        <a class="col-md-4 col-12" href="<?php the_permalink(); ?>">
                                            <?php
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail( 'medium', array( 'class' => 'img-fluid project-image rounded shadow-sm' ) );
                                            } else {
                                                ?>
                                                <img class="img-fluid project-image rounded shadow-sm" src="<?php echo esc_url( DEVELOPER_THEME_ASSETS . '/images/projects/project-1.png' ); ?>" alt="<?php the_title_attribute(); ?>" />
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <div class="desc col-md-8 col-12">
                                            <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <?php the_excerpt(); ?>
                                            <p><a class="more-link" href="<?php the_permalink(); ?>"><i class="fas fa-external-link-alt"></i><?php esc_html_e( 'Find out more', 'developer-theme-wp' ); ?></a></p>
                                        </div><!--//desc-->
                                    </div><!--//item-->
                                    <?php
                                }
                            }
                            wp_reset_postdata();
                        } else {
                            ?>
                            <p><?php esc_html_e( 'No projects found. Create some posts to display them here.', 'developer-theme-wp' ); ?></p>
                            <?php
                        }
                        ?>
                    </div><!--//content-->
                </div><!--//section-inner-->
            </section><!--//section-->

            <!-- Work Experience Section -->
            <section class="experience section">
                <div class="section-inner shadow-sm rounded">
                    <h2 class="heading"><?php esc_html_e( 'Work Experience', 'developer-theme-wp' ); ?></h2>
                    <div class="content">
                        <?php
                        $experience = get_theme_mod( 'front_page_experience', array(
                            array(
                                'title'       => 'Co-Founder & Lead Developer',
                                'company'     => 'Startup Hub',
                                'period'      => '2023 - Present',
                                'description' => 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.',
                            ),
                            array(
                                'title'       => 'Software Engineer',
                                'company'     => 'Google',
                                'period'      => '2020 - 2023',
                                'description' => 'Vivamus a tortor eu turpis pharetra consequat quis non metus.',
                            ),
                            array(
                                'title'       => 'Software Engineer',
                                'company'     => 'eBay',
                                'period'      => '2019 - 2020',
                                'description' => 'Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero.',
                            ),
                        ) );

                        if ( is_string( $experience ) ) {
                            $experience = json_decode( $experience, true );
                        }

                        if ( is_array( $experience ) ) {
                            foreach ( $experience as $job ) {
                                if ( isset( $job['title'] ) ) {
                                    ?>
                                    <div class="item">
                                        <h3 class="title">
                                            <?php echo esc_html( $job['title'] ); ?> - 
                                            <span class="place">
                                                <a href="<?php echo esc_attr( isset( $job['company_url'] ) ? $job['company_url'] : '#' ); ?>">
                                                    <?php echo esc_html( isset( $job['company'] ) ? $job['company'] : '' ); ?>
                                                </a>
                                            </span> 
                                            <span class="year">(<?php echo esc_html( isset( $job['period'] ) ? $job['period'] : '' ); ?>)</span>
                                        </h3>
                                        <p>
                                            <?php echo wp_kses_post( isset( $job['description'] ) ? $job['description'] : '' ); ?>
                                        </p>
                                    </div><!--//item-->
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div><!--//content-->
                </div><!--//section-inner-->
            </section><!--//section-->

            <!-- GitHub Section -->
            <section class="github section">
                <div class="section-inner shadow-sm rounded">
                    <h2 class="heading"><?php esc_html_e( 'My GitHub', 'developer-theme-wp' ); ?></h2>
                    <p>
                        <?php
                        echo wp_kses_post(
                            sprintf(
                                __( 'You can embed your GitHub contribution graph calendar using IonicaBizau\'s %s widget.', 'developer-theme-wp' ),
                                '<a href="https://github.com/IonicaBizau/github-calendar" target="_blank">GitHub Calendar</a>'
                            )
                        );
                        ?>
                    </p>

                    <div id="github-graph" class="github-graph">
                    </div><!--//github-graph-->

                    <p>
                        <?php
                        echo wp_kses_post(
                            sprintf(
                                __( 'You can also embed your GitHub activities using Casey Scarborough\'s %s widget.', 'developer-theme-wp' ),
                                '<a href="https://github.com/caseyscarborough/github-activity" target="_blank">GitHub Activity Stream</a>'
                            )
                        );
                        ?>
                    </p>

                    <div id="ghfeed" class="ghfeed">
                    </div><!--//ghfeed-->
                </div><!--//section-inner-->
            </section><!--//section-->
        </div><!--//primary-->

        <?php get_template_part( 'sidebar' ); ?>
    </div><!--//row-->
</div><!--//masonry-->

<?php get_footer(); ?>
