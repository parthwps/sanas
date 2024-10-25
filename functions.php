<?php
/**
 * sanas functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sanas
 */

if (!defined('SANAS_VERSION')) {
    // Replace the version number of the theme on each release.
    define('SANAS_VERSION', '1.5.7878485');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sanas_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sanas, use a find and replace
		* to change 'sanas' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sanas', get_template_directory() . '/languages' );

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
            'sanas-main-menu' => esc_html__('Header', 'sanas'),
            'sanas-footer-menu' => esc_html__('Footer', 'sanas'),
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
			'sanas_custom_background_args',
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
add_action( 'after_setup_theme', 'sanas_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sanas_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sanas_content_width', 640 );
}
add_action( 'after_setup_theme', 'sanas_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sanas_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sanas' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sanas' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget widget-box widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="blog-sidebar-heading">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'sanas_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sanas_scripts() {
	wp_enqueue_style( 'sanas-style', get_stylesheet_uri(), array(), SANAS_VERSION );
	wp_style_add_data( 'sanas-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sanas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), SANAS_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sanas_scripts' );

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

require get_template_directory() . '/inc/includes-files.php';
/*
Load All Require File
 */
do_action('sanas_includes_file');

// Hide the admin bar for subscribers
add_filter('show_admin_bar', 'hide_admin_bar_for_subscribers');
function hide_admin_bar_for_subscribers($show_admin_bar) {
    if (current_user_can('subscriber')) {
        return false;
    }
    return $show_admin_bar;
}

// Handle the video upload via AJAX
function handle_video_upload() {
    check_ajax_referer('video-upload-nonce', 'nonce');

    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    $file = $_FILES['video'];
    $uploaded_file = wp_handle_upload($file, array('test_form' => false));

    if (isset($uploaded_file['file'])) {
        $file_name_and_location = $uploaded_file['file'];
        $file_title_for_media_library = $file['name'];

        $wp_upload_dir = wp_upload_dir();

        $attachment = array(
            'guid'           => $wp_upload_dir['url'] . '/' . basename($file_name_and_location),
            'post_mime_type' => $uploaded_file['type'],
            'post_title'     => preg_replace('/\.[^.]+$/', '', basename($file_name_and_location)),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );

        $attach_id = wp_insert_attachment($attachment, $file_name_and_location);

        require_once(ABSPATH . 'wp-admin/includes/image.php');

        $attach_data = wp_generate_attachment_metadata($attach_id, $file_name_and_location);
        wp_update_attachment_metadata($attach_id, $attach_data);

        echo wp_get_attachment_url($attach_id);
    } else {
        echo 'Upload failed!';
    }

    wp_die();
}
add_action('wp_ajax_handle_video_upload', 'handle_video_upload');
add_action('wp_ajax_nopriv_handle_video_upload', 'handle_video_upload');


class Footer_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start the element output.
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        // Link attributes
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        // Start the anchor tag
        $item_output = '<a' . $attributes . '>';

        // Add Font Awesome icon before the menu item text
        $item_output .= '<i class="fa-solid fa-chevron-right"></i>';

        // Add the menu item text
        $item_output .= apply_filters('the_title', $item->title, $item->ID);

        // Close the anchor tag
        $item_output .= '</a>';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}



add_action('wp_ajax_remove_from_wishlist', 'sanas_remove_from_wishlist');
add_action('wp_ajax_nopriv_remove_from_wishlist', 'sanas_remove_from_wishlist');

function sanas_remove_from_wishlist() {
    global $wpdb;
    check_ajax_referer('sanas_wishlist_nonce', 'security');
    $user_id = get_current_user_id();
    $card_id = intval($_POST['card_id']);

    if (!$user_id) {
        wp_send_json_error(['message' => 'You must be logged in to manage your wishlist.']);
    }

    $result = $wpdb->delete(
        "{$wpdb->prefix}sanas_wishlist",
        array('user_id' => $user_id, 'card_id' => $card_id),
        array('%d', '%d')
    );

    if ($result === false) {
        error_log('Error removing card from wishlist: ' . $wpdb->last_error);
        wp_send_json_error(['message' => 'Failed to remove card from wishlist.']);
    } else {
        wp_send_json_success(['message' => 'Card removed from wishlist', 'action' => 'removed']);
    }

    wp_die();
}


function create_todo_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'todo_list';

    // Check if the table already exists
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id INT NOT NULL AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            category VARCHAR(255) NOT NULL,
            notes TEXT,
            date DATE NOT NULL,
            status VARCHAR(50) NOT NULL DEFAULT 'Yet To Start',
			completed INT(1) NOT NULL DEFAULT 0,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
add_action('after_switch_theme', 'create_todo_table');

function get_todo_list_items() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'todo_list';
    $user_id = get_current_user_id();

    $results = $wpdb->get_results($wpdb->prepare("
        SELECT * FROM $table_name 
        WHERE user_id = %d 
        ORDER BY date DESC
    ", $user_id), ARRAY_A);

    return $results;
}

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('my-ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery'), null, true);
    wp_localize_script('my-ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
});

// Function to add a to-do item
add_action('wp_ajax_add_todo_item', 'add_todo_item');
function add_todo_item() {
    global $wpdb;
    $current_user_id = get_current_user_id();

    $title = sanitize_text_field($_POST['title']);
    $date = sanitize_text_field($_POST['date']);
    $category = sanitize_text_field($_POST['category']);
    $notes = sanitize_textarea_field($_POST['notes']);

    $wpdb->insert(
        $wpdb->prefix . 'todo_list',
        array(
            'title' => $title,
            'date' => $date,
            'category' => $category,
            'notes' => $notes,
            'user_id' => $current_user_id,
        )
    );

    if ($wpdb->insert_id) {
        wp_send_json_success('To-Do item added successfully.');
    } else {
        wp_send_json_error('Failed to add To-Do item.');
    }
}

// Function to edit a to-do item
add_action('wp_ajax_edit_todo_item', 'edit_todo_item');
function edit_todo_item() {
    global $wpdb;
    $current_user_id = get_current_user_id();
    $id = intval($_POST['id']);

    // Sanitize input
    $title = sanitize_text_field($_POST['title']);
    $date = sanitize_text_field($_POST['date']);
    $category = sanitize_text_field($_POST['category']);
    $notes = sanitize_textarea_field($_POST['notes']);

    // Update the database
    $result = $wpdb->update(
        $wpdb->prefix.'todo_list',
        array(
            'title' => $title,
            'date' => $date,
            'category' => $category,
            'notes' => $notes,
        ),
        array('id' => $id, 'user_id' => $current_user_id)
    );

    if ($result !== false) {
        wp_send_json_success('To-Do item updated successfully.');
    } else {
        wp_send_json_error('Failed to update To-Do item.');
    }
}

// Function to toggle the completed status of a to-do item
add_action('wp_ajax_toggle_todo_completed', 'toggle_todo_completed');
function toggle_todo_completed() {
    global $wpdb;
    $current_user_id = get_current_user_id();
    $id = intval($_POST['id']);
    $completed = intval($_POST['completed']);

    $result = $wpdb->update(
        $wpdb->prefix.'todo_list',
        array('completed' => $completed),
        array('id' => $id, 'user_id' => $current_user_id)
    );

    if ($result !== false) {
        wp_send_json_success('To-Do item status updated successfully.');
    } else {
        wp_send_json_error('Failed to update To-Do item status.');
    }
    wp_die();
}

add_action('wp_ajax_update_todo_status', 'update_todo_status');
function update_todo_status() {
    global $wpdb;
    $current_user_id = get_current_user_id();
    $id = intval($_POST['id']);
    $status = sanitize_text_field($_POST['status']);

    $result = $wpdb->update(
        $wpdb->prefix . 'todo_list',
        array('status' => $status),
        array('id' => $id, 'user_id' => $current_user_id)
    );

    if ($result !== false) {
        wp_send_json_success('Status updated successfully.');
    } else {
        wp_send_json_error('Failed to update status.');
    }
}


// Function to retrieve a to-do item for editing
add_action('wp_ajax_get_todo_item', 'get_todo_item');
function get_todo_item() {
    global $wpdb;
    $current_user_id = get_current_user_id();
    $id = intval($_POST['id']);
	$tablename = $wpdb->prefix.'todo_list';
    $item = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $tablename WHERE id = %d AND user_id = %d",
        $id,
        $current_user_id
    ));

    if ($item) {
        wp_send_json_success($item);
    } else {
        wp_send_json_error('To-Do item not found or access denied.');
    }
}

// Optional: Function to delete a to-do item
add_action('wp_ajax_delete_todo_item', 'delete_todo_item');
function delete_todo_item() {
    global $wpdb;
    $current_user_id = get_current_user_id();
    $id = intval($_POST['id']);

    // Delete the to-do item for the current user
    $result = $wpdb->delete(
        $wpdb->prefix . 'todo_list', // Change to your actual table name
        array('id' => $id, 'user_id' => $current_user_id) // Ensure the current user can only delete their own items
    );

    if ($result) {
        wp_send_json_success('To-Do item deleted successfully.');
    } else {
        wp_send_json_error('Failed to delete To-Do item.');
    }
}

function create_vendor_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'vendor_list';

    // Check if the table already exists
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id INT NOT NULL AUTO_INCREMENT,
            user_id INT NOT NULL,
            category VARCHAR(255) NOT NULL,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            notes TEXT,
            social_media_profile VARCHAR(255),
            pricing DECIMAL(10, 2),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
add_action('after_switch_theme', 'create_vendor_table');

// Function to add a vendor item
add_action('wp_ajax_add_vendor_item', 'add_vendor_item');
function add_vendor_item() {
    global $wpdb;
    $current_user_id = get_current_user_id();

    $category = sanitize_text_field($_POST['category']);
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_text_field($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $notes = sanitize_textarea_field($_POST['notes']);
    $social_media_profile = sanitize_text_field($_POST['social_media_profile']);
    $pricing = floatval($_POST['pricing']);

    $wpdb->insert(
        $wpdb->prefix . 'vendor_list',
        array(
            'user_id' => $current_user_id,
            'category' => $category,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'notes' => $notes,
            'social_media_profile' => $social_media_profile,
            'pricing' => $pricing,
        )
    );

    if ($wpdb->insert_id) {
        wp_send_json_success('Vendor item added successfully.');
    } else {
        wp_send_json_error('Failed to add vendor item.');
    }
}

// Function to get all vendor items for the current user
add_action('wp_ajax_get_vendor_list_items', 'get_vendor_list_items');
function get_vendor_list_items() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'vendor_list';
    $current_user_id = get_current_user_id();
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE user_id = %d",
            $current_user_id
        ),
        ARRAY_A
    );
    return $results;
}

add_action('wp_ajax_edit_vendor_item', 'edit_vendor_item');
function edit_vendor_item() {
    global $wpdb;
    $current_user_id = get_current_user_id();
    $id = intval($_POST['id']);

    $category = sanitize_text_field($_POST['category']);
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_text_field($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $notes = sanitize_textarea_field($_POST['notes']);
    $social_media_profile = sanitize_text_field($_POST['social_media_profile']);
    $pricing = floatval($_POST['pricing']);

    $result = $wpdb->update(
        $wpdb->prefix . 'vendor_list',
        array(
            'category' => $category,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'notes' => $notes,
            'social_media_profile' => $social_media_profile,
            'pricing' => $pricing,
        ),
        array('id' => $id, 'user_id' => $current_user_id)
    );

    if ($result !== false) {
        wp_send_json_success('Vendor item updated successfully.');
    } else {
        wp_send_json_error('Failed to update vendor item.');
    }
}

add_action('wp_ajax_get_vendor_list_item', 'get_vendor_list_item');
function get_vendor_list_item() {
    global $wpdb;
    $current_user_id = get_current_user_id();
    $id = intval($_POST['id']);

    $table_name = $wpdb->prefix . 'vendor_list';
    $vendor = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE id = %d AND user_id = %d",
            $id,
            $current_user_id
        ),
        ARRAY_A
    );

    if ($vendor) {
        wp_send_json_success($vendor);
    } else {
        wp_send_json_error('Vendor item not found or access denied.');
    }
}
