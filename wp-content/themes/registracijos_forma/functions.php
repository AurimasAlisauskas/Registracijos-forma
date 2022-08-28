<?php
/**
 * Registracijos forma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Registracijos_forma
 */

require_once('wp_bootstrap_navwalker.php');

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function registracijos_forma_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Registracijos forma, use a find and replace
		* to change 'registracijos_forma' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'registracijos_forma', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'registracijos_forma' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'registracijos_forma_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'registracijos_forma_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function registracijos_forma_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'registracijos_forma_content_width', 640 );
}
add_action( 'after_setup_theme', 'registracijos_forma_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function registracijos_forma_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'registracijos_forma' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'registracijos_forma' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'registracijos_forma_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function registracijos_forma_scripts() {
	wp_enqueue_style( 'registracijos_forma-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'registracijos_forma-style', 'rtl', 'replace' );

	wp_enqueue_script( 'registracijos_forma-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'registracijos_forma-jquery-script', get_template_directory_uri() . '/src/js/jquery/jquery.js', array(), '20151215', true );

	wp_enqueue_script( 'contact-form', get_template_directory_uri() . '/src/js/contact.js', array(), '', true );

	wp_enqueue_script( 'registracijos_forma-main-scripts', get_template_directory_uri() . '/assets/scripts.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'registracijos_forma_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Add the shortcode for contact form
add_shortcode( 'contact-form', 'display_contact_form' );


/**
 * This function displays the validation messages, the success message, the container of the validation messages, and the
 * contact form.
 */
function display_contact_form() {

	$validation_messages = [];
	$success_message = '';

	if ( isset( $_POST['contact_form'] ) ) {

		//Sanitize the data
		$full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
		$email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
		$phone     = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
		$datetime  = isset( $_POST['datetime'] ) ? sanitize_text_field( $_POST['datetime'] ) : '';
		$message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

		//Validate the data
		if ( strlen( $full_name ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid name.', 'twentytwentyone' );
		}

		if ( strlen( $email ) === 0 or
		     ! is_email( $email ) ) {
			$validation_messages[] = esc_html__( 'Please enter a valid email address.', 'twentytwentyone' );
		}

		if ( strlen( $phone ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid phone number.', 'twentytwentyone' );
		}

		if ( strlen( $datetime ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid date and time.', 'twentytwentyone' );
		}

		if ( strlen( $message ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid message.', 'twentytwentyone' );
		}

		//Send an email to the WordPress administrator if there are no validation errors
		if ( empty( $validation_messages ) ) {

			$mail    = get_option( 'admin_email' );
			$subject = 'Nauja registracija remontui nuo ' . $full_name;
			$message = "Vardas: " . $full_name . "\r\n\r\n El. paštas: " . $email . "\r\n\r\n Pageidaujama data ir laikas: " . $datetime . "\r\n\r\n Telefonas: " . $phone . "\r\n\r\n Komentaras: " . $message;

			wp_mail( $mail, $subject, $message );

			$success_message = esc_html__( 'Jūsų registracijos forma sėkmingai išsiųsta. Netrukus su Jumis susisieksime!', 'twentytwentyone' );

		}

	}

	//Display the validation errors
	if ( ! empty( $validation_messages ) ) {
		foreach ( $validation_messages as $validation_message ) {
			echo '<div class="validation-message">' . esc_html( $validation_message ) . '</div>';
		}
	}

	//Display the success message
	if ( strlen( $success_message ) > 0 ) {
		echo '<div class="success-message">' . esc_html( $success_message ) . '</div>';
	}

	?>

    <form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>" method="post">

        <input type="hidden" name="contact_form">

        <div class="form-section">
            <label for="full-name"><?php echo esc_html( 'Vardas', 'twentytwentyone' ); ?></label>
            <input type="text" id="full-name" name="full_name">
        </div>

        <div class="form-section">
            <label for="email"><?php echo esc_html( 'El. paštas', 'twentytwentyone' ); ?></label>
            <input type="text" id="email" name="email">
        </div>

		<div class="form-section">
            <label for="phone"><?php echo esc_html( 'Tel. Nr.', 'twentytwentyone' ); ?></label>
            <input type="text" id="phone" name="phone">
        </div>

		<div class="form-section">
            <label for="datetime"><?php echo esc_html( 'Pageidaujamas laikas (data ir valanda)', 'twentytwentyone' ); ?></label>
            <input type="text" id="datetime" name="datetime">
        </div>

        <div class="form-section">
            <label for="message"><?php echo esc_html( 'Komentaras', 'twentytwentyone' ); ?></label>
            <textarea id="message" name="message"></textarea>
        </div>

        <input type="submit" id="contact-form-submit" value="<?php echo esc_attr( 'Registruotis', 'twentytwentyone' ); ?>">

    </form>

	<!-- Echo a container used that will be used for the JavaScript validation -->
	<div id="validation-messages-container"></div>

	<?php

}




if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_1',
		'title' => 'My Group',
		'fields' => array (
			array (
				'key' => 'field_1',
				'label' => 'Sub Title',
				'name' => 'sub_title',
				'type' => 'text',
				'prefix' => '',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));
	
	endif;