<?php
/**
 * Setup theme functions for Melos.
 *
 * @package ThinkUpThemes
 */

// Declare latest theme version
$GLOBALS['thinkup_theme_version'] = '1.4.5';

// Setup content width
function thinkup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thinkup_content_width', 1170 );
}
add_action( 'after_setup_theme', 'thinkup_content_width', 0 );


//----------------------------------------------------------------------------------
//	Add Theme Options Panel & Assign Variable Values
//----------------------------------------------------------------------------------

	// Add Cusomizer Framework
	require_once( get_template_directory() . '/admin/main/framework.php' );
	require_once( get_template_directory() . '/admin/main/options.php' );

	// Add Toolbox Framework
	require_once( get_template_directory() . '/admin/main-toolbox/toolbox.php' );

	// Add Theme Options Features.
	require_once( get_template_directory() . '/admin/main/options/00.theme-setup.php' ); 
	require_once( get_template_directory() . '/admin/main/options/01.general-settings.php' ); 
	require_once( get_template_directory() . '/admin/main/options/02.homepage.php' ); 
	require_once( get_template_directory() . '/admin/main/options/03.header.php' ); 
	require_once( get_template_directory() . '/admin/main/options/04.footer.php' );
	require_once( get_template_directory() . '/admin/main/options/05.blog.php' ); 

	// Add Migration Scripts
	require_once( get_template_directory() . '/admin/main/options/99.migration.php' );


//----------------------------------------------------------------------------------
//	Assign Theme Specific Functions
//----------------------------------------------------------------------------------

// Setup theme features, register menus and scripts.
if ( ! function_exists( 'thinkup_themesetup' ) ) {

	function thinkup_themesetup() {

		// Load required files
		require_once ( get_template_directory() . '/lib/functions/extras.php' );
		require_once ( get_template_directory() . '/lib/functions/template-tags.php' );

		// Make theme translation ready.
		load_theme_textdomain( 'melos', get_template_directory() . '/languages' );

		// Add default theme functions.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'image' ) );
		add_theme_support( 'title-tag' );

		// Add support for custom background
		add_theme_support( 'custom-background' );

		// Add support for custom header
		$thinkup_header_args = apply_filters( 'thinkup_custom_header', array( 'height' => 200, 'width'  => 1600, 'header-text' => false, 'flex-height' => true ) );
		add_theme_support( 'custom-header', $thinkup_header_args );

		// Add support for custom logo
		add_theme_support( 'custom-logo', array( 'height' => 90, 'width' => 200, 'flex-width' => true, 'flex-height' => true ) );

		// Add WooCommerce functions.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Add excerpt support to pages.
		add_post_type_support( 'page', 'excerpt' );

		// Register theme menu's.
		register_nav_menus( array( 'pre_header_menu' => __( 'Pre Header Menu', 'melos' ) ) );
		register_nav_menus( array( 'header_menu'     => __( 'Primary Header Menu', 'melos' ) ) );
		register_nav_menus( array( 'sub_footer_menu' => __( 'Footer Menu', 'melos' ) ) );
	}
}
add_action( 'after_setup_theme', 'thinkup_themesetup' );


//----------------------------------------------------------------------------------
//	Register Front-End Styles And Scripts
//----------------------------------------------------------------------------------

function thinkup_frontscripts() {

	global $thinkup_theme_version;

	// Add 3rd party stylesheets
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/lib/extentions/prettyPhoto/css/prettyPhoto.css', '', '3.1.6' );

	// Add 3rd party stylesheets - Prefixed to prevent conflict between library versions
	wp_enqueue_style( 'thinkup-bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/css/bootstrap.min.css', '', '2.3.2' );

	// Add 3rd party Font Packages
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

	// Add 3rd party scripts
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'prettyPhoto', ( get_template_directory_uri().'/lib/extentions/prettyPhoto/js/jquery.prettyPhoto.js' ), array( 'jquery' ), '3.1.6', 'true' );
	wp_enqueue_script( 'jquery-scrollup', get_template_directory_uri() . '/lib/scripts/plugins/scrollup/jquery.scrollUp.min.js', array( 'jquery' ), '2.4.1', 'true' );

	// Add 3rd party scripts - Prefixed to prevent conflict between library versions
	wp_enqueue_script( 'thinkup-bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/js/bootstrap.js', array( 'jquery' ), '2.3.2', 'true' );

	// Add theme stylesheets
	wp_enqueue_style( 'thinkup-shortcodes', get_template_directory_uri() . '/styles/style-shortcodes.css', '', $thinkup_theme_version );
	wp_enqueue_style( 'thinkup-style', get_stylesheet_uri(), '', $thinkup_theme_version );

	// Add theme scripts
	wp_enqueue_script( 'thinkup-frontend', get_template_directory_uri() . '/lib/scripts/main-frontend.js', array( 'jquery' ), $thinkup_theme_version, 'true' );

	// Register theme stylesheets
	wp_register_style( 'thinkup-responsive', get_template_directory_uri() . '/styles/style-responsive.css', '', $thinkup_theme_version );

	// Register WooCommerce (theme specific) stylesheets

	// Add Masonry script to all archive pages
	if ( thinkup_check_isblog() or is_page_template( 'template-blog.php' ) or is_archive() ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	// Add Portfolio styles & scripts

	// Add ThinkUpSlider scripts
	wp_enqueue_script( 'responsiveslides', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides.min.js', array( 'jquery' ), '1.54', 'true' );
	wp_enqueue_script( 'thinkup-responsiveslides', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides-call.js', array( 'jquery' ), $thinkup_theme_version, 'true' );

	// Add comments reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_frontscripts', 10 );


//----------------------------------------------------------------------------------
//	Register Back-End Styles And Scripts
//----------------------------------------------------------------------------------

function thinkup_adminscripts() {

	if ( is_customize_preview() ) {

		global $thinkup_theme_version;

		// Add theme stylesheets
		wp_enqueue_style( 'thinkup-backend', get_template_directory_uri() . '/styles/backend/style-backend.css', '', $thinkup_theme_version );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

		// Add theme scripts
		wp_enqueue_script( 'thinkup-backend', get_template_directory_uri() . '/lib/scripts/main-backend.js', array( 'jquery' ), $thinkup_theme_version );

	}
}
add_action( 'admin_enqueue_scripts', 'thinkup_adminscripts' );


//----------------------------------------------------------------------------------
//	Register Theme Widgets
//----------------------------------------------------------------------------------

function thinkup_widgets_init() {

	// Register default sidebar
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'melos' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Register footer sidebars
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'melos' ),
        'id'            => 'footer-w1',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'melos' ),
        'id'            => 'footer-w2',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 3', 'melos' ),
        'id'            => 'footer-w3',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 4', 'melos' ),
        'id'            => 'footer-w4',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 5', 'melos' ),
        'id'            => 'footer-w5',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 6', 'melos' ),
        'id'            => 'footer-w6',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

	// Register sub-footer sidebars
    register_sidebar( array(
        'name'          => __( 'Sub-Footer Column 1', 'melos' ),
        'id'            => 'sub-footer-w1',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="sub-footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sub-Footer Column 2', 'melos' ),
        'id'            => 'sub-footer-w2',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="sub-footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
}
add_action( 'widgets_init', 'thinkup_widgets_init' );

function wpcourses_breadcrumb( $sep = ' > ' ) {
	global $post;
	$out = '';
	$out .= '<div class="wpcourses-breadcrumbs">';
	$out .= '<a href="' . home_url( '/' ) . '">Главная</a>';
	$out .= '<span class="wpcourses-breadcrumbs-sep">' . $sep . '</span>';
	if ( is_single() ) {
		$terms = get_the_terms( $post, 'category' );
		if ( is_array( $terms ) && $terms !== array() ) {
			$out .= '<a href="' . get_term_link( $terms[0] ) . '">' . $terms[0]->name . '</a>';
			$out .= '<span class="wpcourses-breadcrumbs-sep">' . $sep . '</span>';
		}
	}
	
	if ( is_singular() ) {
		$out .= '<span class="wpcourses-breadcrumbs-last">' . get_the_title() . '</span>';
	}
	
	if ( is_category() ) {
		$out .= '<span class="wpcourses-breadcrumbs-last">' . single_cat_title('', false) . '</span>';
	}
	
	if ( is_search() ) {
		$out .= get_search_query();
	}
	$out .= '</div><!--.wpcourses-breadcrumbs-->';
	return $out;
}

/*-----Custom Post Type-----*/

function wpcourses_breadcrumb_arc( $sep = ' > ' ) {
	global $post;
	$out = '';
	$out .= '<div class="wpcourses-breadcrumbs">';
	$out .= '<a href="' . home_url( '/' ) . '">Главная</a>';
	$out .= '<span class="wpcourses-breadcrumbs-sep">' . $sep . '</span>';
	if ( is_single() ) {
			$out .= '<a href="/news">Новости</a>';
			$out .= '<span class="wpcourses-breadcrumbs-sep">' . $sep . '</span>';
	}
	if ( is_singular() ) {
		$out .= '<span class="wpcourses-breadcrumbs-last">' . get_the_title() . '</span>';
	}

	if ( is_archive() ) {
		$out .= '<span class="wpcourses-breadcrumbs-last">' .  get_the_archive_title() . '</span>';
	}
	
	if ( is_search() ) {
		$out .= get_search_query();
	}
	$out .= '</div><!--.wpcourses-breadcrumbs-->';
	return $out;
}

function my_taxonomies_news() {
   $labels = array(
      'name'              => _x( 'Категории новостей', 'taxonomy general name', 'melos' ),
      'singular_name'     => _x( 'Категория новостей', 'taxonomy singular name', 'melos' ),
      'search_items'      => __( 'Найти категорию новостей', 'melos' ),
      'all_items'         => __( 'Все категории новостей', 'melos' ),
      'parent_item'       => __( 'Родительская категория новостей', 'melos' ),
      'parent_item_colon' => __( 'Родительская категория новостей:', 'melos' ),
      'edit_item'         => __( 'Редактировать категорию новостей', 'melos' ),
      'update_item'       => __( 'Обновить категорию новостей', 'melos' ),
      'add_new_item'      => __( 'Добавить новую категорию новостей', 'melos' ),
      'new_item_name'     => __( 'Новая категория новостей', 'melos' ),
      'menu_name'         => __( 'Категории новостей', 'melos' ),
   );
   $args = array(
      'labels' => __($labels, 'melos'),
      'hierarchical' => true,
	  'public' => true,
	  'show_admin_column' => true
   );
   register_taxonomy( 'news_category', array('news'), $args );
	
	// создание линейной таксономии для авторов книг
	
	$labelstag = array(
	  'name'              => _x('Теги', 'taxonomy general name'),
      'singular_name'     => _x('Тег', 'taxonomy singular name'),
      'search_items'      => __('Поиск тега'),
      'popular_items'     => __('Популярные теги'),
      'all_items'         => __('Все теги'),
      'parent_item'       => null, // нет родителя
      'parent_item_colon' => null, // нет родителя
      'edit_item'         => __('Изменить данные тега'),
      'update_item'       => __('Обновить данные тега'),
      'add_new_item'      => __('Добавить нового тега'),
      'new_item_name'     => __('Имя нового тега'),
      'menu_name'         => __('Теги'),
      'add_or_remove_items' => __('Добавить или удалить теги'),
      'choose_from_most_used' => __('Популярные теги'),
      'separate_items_with_commas' => __('Разделяйте теги запятыми'),
		);
	
	$argstag = array(
		'hierarchical'  => false,
   		'show_ui'       => true,
   		'query_var'     => true,
   		'labels'        => $labelstag,
		'show_admin_column' => true
		);
		register_taxonomy('news_tag', 'news', $argstag);
}
add_action( 'init', 'my_taxonomies_news', 0 );

function my_custom_post_news() {
    $labels = array(
        'name' => _x( 'Новости', 'post type general name', 'melos' ),
        'singular_name' => _x( 'Новость', 'post type singular name', 'melos' ),
        'menu_name' => __( 'Новости', 'melos' ),
        'all_items' => __( 'Все новости', 'melos' ),
        'view_item' => __( 'Смотреть новость', 'melos' ),
        'add_new_item' => __( 'Добавить новую новость', 'melos' ),
        'add_new' => __( 'Добавить новую', 'melos' ),
        'edit_item' => __( 'Редактировать новость', 'melos' ),
        'update_item' => __( 'Обновить новость', 'melos' ),
        'search_items' => __( 'Найти новость', 'melos' ),
        'not_found' => __( 'Новости не найдены', 'melos' ),
        'not_found_in_trash' => __( 'Нет удаленных новостей', 'melos' ),
    );

    $args = array(
        'label' => __( 'Новости', 'melos' ),
        'description' => __( 'Пользовательский тип записей новостей', 'melos' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'news_category' , 'news_tag' , 'author', 'revisions', 'custom-fields'),
        'taxonomies' => array( 'news_category', 'news_tag' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'news', $args );
	flush_rewrite_rules(false);

}
add_action( 'init', 'my_custom_post_news');

function my_updated_messages( $messages ) {
   global $post, $post_ID;
   $messages['news'] = array(
      0 => '',
      1 => sprintf( __('Новость обновлена. <a href="%s">Посмотреть</a>'), esc_url( get_permalink($post_ID) ) ),
      2 => __('Пользовательские поля обновлены.'),
      3 => __('Пользовательские поля обновлены.'),
      4 => __('Новость обновлена.'),
      5 => isset($_GET['revision']) ? sprintf( __('News restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6 => sprintf( __('Новость опубликована. <a href="%s">Посмотреть</a>'), esc_url( get_permalink($post_ID) ) ),
      7 => __('Новость сохранена.'),
      8 => sprintf( __('Новость отправлена. <a target="_blank" href="%s">Посмотреть</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
      9 => sprintf( __('Новость запланирована на: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Посмотреть</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
      10 => sprintf( __('News draft updated. <a target="_blank" href="%s">Посмотреть</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
   );
   return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );

