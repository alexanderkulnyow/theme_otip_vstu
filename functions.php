<?php
/**
 * Otip_Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Otip_Theme
 */

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );

if ( ! function_exists( 'otip_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function otip_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Otip_Theme, use a find and replace
		 * to change 'otip_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'theme_otip_vstu', get_template_directory() . '/languages' );

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



		add_theme_support( 'custom-logo', array(
			'widht'      => 110,
			'height'     => 40,
			'flex-widht' => true
		) );

		function university_logo(){
			if( has_custom_logo() ):
				echo get_custom_logo();
			else:
				echo '<a href="/" class="navbar-brand"><img class="logo" src="https://placehold.it/110x40&text=NO LOGO" alt=""></a>';
			endif;
		}

		add_filter( 'get_custom_logo', 'change_logo_class' );
		function change_logo_class( $html ) {

			$html = str_replace( 'custom-logo', 'logo', $html );
			$html = str_replace( 'custom-logo-link', 'navbar-brand', $html );

			return $html;
		}
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'theme_otip_vstu' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'otip_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'otip_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function otip_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'otip_theme_content_width', 640 );
}

add_action( 'after_setup_theme', 'otip_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'otip_theme_widgets_init' );
function otip_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme_otip_vstu' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme_otip_vstu' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );
function theme_styles() {
	wp_enqueue_style( 'otip_fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900|Open+Sans:400,700' );
//	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap 4/bootstrap.min.css' );
//	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css' );
//	wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick/slick.css' );
//	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css//slick/slick-theme.css' );

	wp_enqueue_style( 'otip_theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstrap.js',
		get_template_directory_uri() . '/js/vendor/bts4/bootstrap.min.js', array(), ' 4.4.1', true );

	wp_enqueue_script( 'slick',
		get_template_directory_uri() . '/js/vendor/slick.min.js', array(), ' 1', true );

	wp_enqueue_script( 'modernizr-2.8.3.min',
		get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js', array(), ' 1', true );
	wp_enqueue_script( 'plugins',
		get_template_directory_uri() . '/js/plugins.js', array(), ' 1', true );
	wp_enqueue_script( 'otip_theme-navigation',

		get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'main',
		get_template_directory_uri() . '/js/main.js', array(), ' 1', true );
}





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


add_filter( 'wpematico_img_src_url', 'myfunction_img_src', 10, 1 );
function myfunction_img_src( $imagen_src_real ) {
// Find only image filenames after the / and before the ? sign
	preg_match( '/[^\/\?]+\.(?:jp[eg]+|png|bmp|giff?|tiff?)/i', $imagen_src_real, $matches );
// First step of urldecode and sanitize the filename
	$imgname = sanitize_file_name( urldecode( basename( $matches[0] ) ) );
// Split the name from the extension
	$parts     = explode( '.', $imgname );
	$name      = array_shift( $parts );
	$extension = array_pop( $parts );
// Join all names splitted by dots
	foreach ( (array) $parts as $part ) {
		$name .= '.' . $part;
	}
// Second step of urldecode and sanitize only the name of the file
	$name = sanitize_title( urldecode( $name ) );
// Join the name with the extension
	$newimgname = dirname( $imagen_src_real ) . '/' . $name . '.' . $extension;

	return $newimgname;
}


//mishsa load posts
function true_load_posts() {

	$args                = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged']       = $_POST['page'] + 1;
	$args['post_status'] = 'publish';

	query_posts( $args );
	if ( have_posts() ) :

		?>
        <div class="row">
			<?php
			while ( have_posts() ) :
				the_post(); ?>
                <div class="news__item col-md-4 pl-5 pr-5 pb-5">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <h3 class="color_coral" itemprop="name"><?php the_title(); ?></h3>
                    </a>
                    <div class="text-justify mt-4"><?php the_excerpt(); ?></div>

                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="news__link"
                       rel="bookmark"><?php echo esc_html__( 'Read more...', 'theme_otip_vstu' ); ?></a>
                </div>
			<?php
			endwhile; // End of the loop.
			?>
        </div>
	<?php

	endif;
	die();
}

add_action( 'wp_ajax_loadmore', 'true_load_posts' );
add_action( 'wp_ajax_nopriv_loadmore', 'true_load_posts' );


$contacts_page = 'contacts_parametrs';

function contacts_options() {
	global $contacts_page;
	add_theme_page( 'Contacts', 'Contacts', 'manage_options', $contacts_page, 'contacts_option_page' );
}

add_action( 'admin_menu', 'contacts_options' );

function contacts_option_page() {
	global $contacts_page;
	?>
    <div class="wrap">
    <h2><?php echo esc_html__( 'Контакты', 'theme_otip_vstu' )?></h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
		<?php
		settings_fields( 'contacts_options' );
		do_settings_sections( $contacts_page );
		?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'theme_otip_vstu' ) ?>"/>
        </p>

    </form>
    </div><?php
}

function contacts_option_settings() {
	global $contacts_page;
	register_setting( 'contacts_options', 'contacts_options', 'contacts_validate_settings' ); // contacts_options

	add_settings_section( 'contacts_section_1', 'Contacts', '', $contacts_page );

	$contacts_field_params = array(
		'type'      => 'text',
		'id'        => 'my_adres',
		'desc'      => 'Пример обычного текстового поля.',
		'code'      => '<code> echo get_option( \'contacts_options\' )[\'my_adres\']; </code>',
		'label_for' => 'my_adres'
	);
	add_settings_field( 'my_adres_field', 'Адрес', 'contacts_option_display_settings', $contacts_page, 'contacts_section_1', $contacts_field_params );

	$contacts_field_params = array(
		'type'      => 'email',
		'id'        => 'my_mail',
		'desc'      => 'ex@example.com',
		'code'      => '<code> echo get_option( \'dds_options\' )[\'my_mail\']; </code>',
		'label_for' => 'my_mail'
	);
	add_settings_field( 'my_mail_field1', 'e-mail', 'contacts_option_display_settings', $contacts_page, 'contacts_section_1', $contacts_field_params );

	$contacts_field_params = array(
		'type'      => 'tel',// тип
		'id'        => 'my_tel',
		'desc'      => '333-33-33',
		'code'      => '<code> echo get_option( \'contacts_options\' )[\'my_tel\']; </code>',
		'label_for' => 'my_tel'
	);
	add_settings_field( 'my_tel_field', 'Телефон', 'contacts_option_display_settings', $contacts_page, 'contacts_section_1', $contacts_field_params );

	add_settings_section( 'contacts_section_2', 'University Logo', '', $contacts_page );
}

add_action( 'admin_init', 'contacts_option_settings' );

function contacts_option_display_settings( $args ) {
	extract( $args );

	$option_name = 'contacts_options';

	$o = get_option( $option_name );
	switch ( $type ) {
		case 'text':
			$o[ $id ] = esc_attr( stripslashes( $o[ $id ] ) );
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			echo ( $code != '' ) ? "<br /><span class='description'>Code: $code</span>" : "";
			break;
		case 'email':
			$o[ $id ] = esc_attr( stripslashes( $o[ $id ] ) );
			echo "<input class='regular-text' type='email' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			echo ( $code != '' ) ? "<br /><span class='description'>Code: $code</span>" : "";
			break;
		case 'tel':
			$o[ $id ] = esc_attr( stripslashes( $o[ $id ] ) );
			echo "<input class='regular-text' type='tel' id='$id'  name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			echo ( $code != '' ) ? "<br /><span class='description'>Code: $code</span>" : "";
			break;
	}
}


function contacts_validate_settings( $input ) {
	foreach ( $input as $k => $v ) {
		$valid_input[ $k ] = trim( $v );

		/* Вы можете включить в эту функцию различные проверки значений, например
		if(! задаем условие ) { // если не выполняется
			$valid_input[$k] = ''; // тогда присваиваем значению пустую строку
		}
		*/
	}

	return $valid_input;
}

$all_options = get_option( 'contacts_options' );
