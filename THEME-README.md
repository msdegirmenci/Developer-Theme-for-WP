# Developer Theme for WordPress

A Bootstrap-based portfolio and resume template for developers, now fully integrated with WordPress.

## Features

- **Responsive Design**: Fully responsive Bootstrap 5 layout
- **Dark Mode**: Built-in dark mode toggle switch
- **Portfolio Showcase**: Display your projects with featured and regular project layouts
- **Work Experience**: Showcase your professional background
- **Skills Section**: Highlight your technical skills with progress bars
- **Education**: Display your educational background
- **Languages**: Highlight the languages you speak
- **GitHub Integration**: Display your GitHub calendar and activity feed
- **Social Media Links**: Link to your social profiles
- **Professional Testimonials**: Share testimonials and recommendations
- **Blog Feed**: Integrate RSS feeds from your blog or other sources
- **Customizable**: Leverage WordPress Customizer for easy personalization

## Installation

1. Download or clone this theme to your WordPress `wp-content/themes/` directory
2. Log in to your WordPress admin dashboard
3. Go to **Appearance > Themes**
4. Find "Developer Theme for WordPress" and click **Activate**

## Customization

The theme includes several customization options available through the WordPress Customizer:

### Social Media Links
- **Appearance > Customize > Social Media**
  - Twitter URL
  - LinkedIn URL
  - GitHub URL
  - Stack Overflow URL
  - CodePen URL

### Profile Information
- **Appearance > Customize > Profile**
  - Location
  - Email
  - Website

### About Section
- **Appearance > Customize > Front Page Content**
  - About text
  - Work experience items
  - Skills and competencies

### Contact Button
- **Appearance > Customize > Header**
  - Contact page URL
  - Contact button text

### Footer Credits
- **Appearance > Customize > Footer**
  - Credit name
  - Credit URL

## Using with Custom Post Types

To display custom projects instead of blog posts, create a custom post type for projects:

```php
// In functions.php or a custom plugin
register_post_type( 'project', array(
    'label'   => __( 'Projects' ),
    'public'  => true,
    'rewrite' => array( 'slug' => 'projects' ),
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
) );
```

Then modify the `index.php` template to query the custom post type:

```php
$args = array(
    'post_type'      => 'project',  // Change from 'post' to 'project'
    // ... rest of query args
);
```

## Included Plugins/Libraries

- **Bootstrap 5**: Responsive CSS framework
- **Font Awesome**: Icon library
- **GitHub Calendar**: Display your GitHub contribution graph
- **GitHub Activity Stream**: Show your recent GitHub activity
- **Vanilla RSS**: Display RSS feeds
- **Dark Mode Switch**: Built-in dark/light mode toggle
- **Popper.js**: Tooltip and popover positioning

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Template Structure

```
developer-theme-wp/
├── index.php                 # Main template file
├── header.php               # Header/navigation template
├── footer.php               # Footer template
├── sidebar.php              # Sidebar template
├── functions.php            # Theme functions
├── style.css               # Main stylesheet with theme meta
├── assets/
│   ├── css/
│   │   └── styles.css      # Main styles
│   ├── js/
│   │   └── main.js         # Main JavaScript
│   ├── images/
│   ├── plugins/            # Third-party plugins
│   ├── fontawesome/        # Font Awesome icons
│   └── scss/              # SCSS source files
└── languages/              # Localization files
```

## Customization Tips

### Changing the Featured Image Size

Edit `index.php` and modify the `the_post_thumbnail()` function:

```php
the_post_thumbnail( 'full', array( 'class' => 'img-fluid project-image rounded shadow-sm' ) );
```

Available sizes: `thumbnail`, `medium`, `large`, `full`, or custom sizes defined in `functions.php`

### Adding Custom Theme Options

Use the WordPress Theme Customizer in `functions.php`:

```php
// In functions.php
function my_custom_theme_settings( $wp_customize ) {
    $wp_customize->add_setting( 'my_custom_option' );
    $wp_customize->add_control( 'my_custom_option', array(
        'type'    => 'text',
        'section' => 'title_tagline',
        'label'   => 'My Custom Option',
    ) );
}
add_action( 'customize_register', 'my_custom_theme_settings' );
```

### Localization

To translate the theme, create `.po` and `.mo` files in the `languages/` directory:

1. Use a tool like Poedit to create translation files
2. Name them based on your locale (e.g., `developer-theme-wp-tr_TR.po` for Turkish)
3. Place them in the `languages/` folder

## Credits

- Original Design: Xiaoying Riley at [3rd Wave Media](https://themes.3rdwavemedia.com/)
- WordPress Integration: [Your Name/Company]
- Bootstrap: [getbootstrap.com](https://getbootstrap.com/)
- Font Awesome: [fortawesome.github.io](https://fortawesome.github.io/Font-Awesome/)
- GitHub Calendar: [IonicaBizau/github-calendar](https://github.com/IonicaBizau/github-calendar)
- GitHub Activity: [caseyscarborough/github-activity](https://github.com/caseyscarborough/github-activity)
- Dark Mode Switch: [coliff/dark-mode-switch](https://github.com/coliff/dark-mode-switch)

## License

This theme is distributed under the Creative Commons Attribution 3.0 License. 
For more information, see [Creative Commons License](http://creativecommons.org/licenses/by/3.0/)

## Support

For issues or questions about the WordPress implementation, please check the WordPress documentation or the original theme repository.

## Changelog

### Version 1.0.0
- Initial WordPress theme release
- Converted static HTML to WordPress templates
- Added WordPress customizer options
- Integrated WordPress admin functionality
- Full responsive design support
