<?php
/**
 * TwentyTen functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentyten_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentyten_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails, custom headers and backgrounds, and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', get_template_directory() . '/languages' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );
register_nav_menus( array(
		'footer1' => __( 'Footer1 Navigation', 'twentyten' ),
	) );

register_nav_menus( array(
		'footer2' => __( 'Footer2 Navigation', 'twentyten' ),
	) );

register_nav_menus( array(
		'footer3' => __( 'Footer3 Navigation', 'twentyten' ),
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', array(
		// Let WordPress know what our default background color is.
		'default-color' => 'f1f1f1',
	) );

	// The custom header business starts here.

	$custom_header_support = array(
		// The default image to use.
		// The %s is a placeholder for the theme template directory URI.
		'default-image' => '%s/images/headers/path.jpg',
		// The height and width of our custom header.
		'width' => apply_filters( 'twentyten_header_image_width', 940 ),
		'height' => apply_filters( 'twentyten_header_image_height', 198 ),
		// Support flexible heights.
		'flex-height' => true,
		// Don't support text inside the header image.
		'header-text' => false,
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => 'twentyten_admin_header_style',
	);

	add_theme_support( 'custom-header', $custom_header_support );

	if ( ! function_exists( 'get_custom_header' ) ) {
		// This is all for compatibility with versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR', '' );
		define( 'NO_HEADER_TEXT', true );
		define( 'HEADER_IMAGE', $custom_header_support['default-image'] );
		define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
		add_custom_image_header( '', $custom_header_support['admin-head-callback'] );
		add_custom_background();
	}

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );

	// ... and thus ends the custom header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'berries' => array(
			'url' => '%s/images/headers/berries.jpg',
			'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Berries', 'twentyten' )
		),
		'cherryblossom' => array(
			'url' => '%s/images/headers/cherryblossoms.jpg',
			'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Cherry Blossoms', 'twentyten' )
		),
		'concave' => array(
			'url' => '%s/images/headers/concave.jpg',
			'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Concave', 'twentyten' )
		),
		'fern' => array(
			'url' => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Fern', 'twentyten' )
		),
		'forestfloor' => array(
			'url' => '%s/images/headers/forestfloor.jpg',
			'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Forest Floor', 'twentyten' )
		),
		'inkwell' => array(
			'url' => '%s/images/headers/inkwell.jpg',
			'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Inkwell', 'twentyten' )
		),
		'path' => array(
			'url' => '%s/images/headers/path.jpg',
			'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Path', 'twentyten' )
		),
		'sunset' => array(
			'url' => '%s/images/headers/sunset.jpg',
			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Sunset', 'twentyten' )
		)
	) );
}
endif;

if ( ! function_exists( 'twentyten_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in twentyten_setup().
 *
 * @since Twenty Ten 1.0
 */
function twentyten_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If header-text was supported, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since Twenty Ten 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since Twenty Ten 1.0
 * @deprecated Deprecated in Twenty Ten 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );

if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.

	register_sidebar( array(
		'name' => __( 'Header Top Menu Widget Area', 'twentyten' ),
		'id' => 'header-top-menu-widget-area',
		'description' => __( 'Header Top Menu Widget Area', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Header Contact Widget Area', 'twentyten' ),
		'id' => 'header-contact-widget-area',
		'description' => __( 'Header Contact Widget Area', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

register_sidebar( array(
		'name' => __( 'Header Form Widget Area', 'twentyten' ),
		'id' => 'header-form-widget-area',
		'description' => __( 'Header Contact Widget Area', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Newsletter Widget Area', 'twentyten' ),
		'id' => 'newsletter-widget-area',
		'description' => __( 'Newsletter Widget Area', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'twentyten' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'Sidebar Widget Area', 'twentyten' ),
		'before_widget' => '<div class="round_icon_bx2">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );


	register_sidebar( array(
		'name' => __( 'Blog Sidebar Widget Area', 'twentyten' ),
		'id' => 'blog-sidebar-widget-area',
		'description' => __( 'Blog Sidebar Widget Area', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<p><strong>',
		'after_title' => '</strong></p>',
	) );


	register_sidebar( array(
		'name' => __( 'Footer Box Widget Area', 'twentyten' ),
		'id' => 'footer-box-widget-area',
		'description' => __( 'Footer Box Widget Area', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

		register_sidebar( array(
		'name' => __( 'Footer Contact Widget Area', 'twentyten' ),
		'id' => 'footer-contact-widget-area',
		'description' => __( 'Footer Contact Widget Area', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
		register_sidebar( array(
		'name' => __( 'Footer Link Widget Area', 'twentyten' ),
		'id' => 'footer-link-widget-area',
		'description' => __( 'Footer Link Widget Area', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
		register_sidebar( array(
		'name' => __( 'Social Widget Area', 'twentyten' ),
		'id' => 'social-widget-area',
		'description' => __( 'Social Widget Area', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Twenty Ten 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Twenty Ten styling.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), get_the_author() ) ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
add_image_size( 'prod-thumb-size', 220, 165, true ); // 220 pixels wide by 180 pixels tall, hard crop mode




add_action('wpcf7_before_send_mail', 'save_form' );

function save_form( $wpcf7 ) {
   global $wpdb;

   /*
    Note: since version 3.9 Contact Form 7 has removed $wpcf7->posted_data
    and now we use an API to get the posted data.
   */

   $submission = WPCF7_Submission::get_instance();

   if ( $submission ) {

       $submited = array();
       $submited['title'] = $wpcf7->title();
       $submited['posted_data'] = $submission->get_posted_data();
       $flag = false;

	$link = mysql_connect('localhost', 'nexgen_next', 'Nextgen@2015');
	if (!$link) {
		    die('Could not connect: ' . mysql_error());
		}
	$db_selected = mysql_select_db('nexgen_myquote', $link);
	if (!$db_selected) {
		    die ('Can\'t use nexgen_myquote : ' . mysql_error());
		}
		$time = date("H:i:s");
		$date = date("j F");
		$year = date("Y-m-d H:i:s");
		$source = 5; // number represent "WEB-Nexgen"
		$data = array();
		$data['lp_LeadSource'] = $source;
		//setting the keword fetched from the url.
		//if(isset($_COOKIE['keyword'])) {
		//$data['wl_keyword'] = $_COOKIE['keyword'];
		if(isset($_COOKIE['uniqueid'])) { 							//also tried CampaignID
			$data['lp_UniqueID'] = $_COOKIE['uniqueid'];
		}


	if ($submited['title'] == 'Header Contact' ) {

		 $data['lp_ContactFirstName'] = $submited['posted_data']['text-589'];
		 $data['lp_Email'] = $submited['posted_data']['email-691'];
		 $data['lp_Phone'] = $submited['posted_data']['text-813'];
		 $data['lp_Zip'] = $submited['posted_data']['text-13'];
		 $data['lp_Comments'] = $submited['posted_data']['textarea-329'];

		 $sql = "INSERT INTO quote_data (`contact_name`, `email`, `phone`,`postcode`,`time`, `date`,`year`,`source`, `enquiry`) values
		  	     		        ('". $data['lp_ContactFirstName']."','".$data['lp_Email']."','".$data['lp_Phone']."','".$data['lp_Zip']."',"
                                                . "'$time','$date','$year','$source','".$data['lp_Comments']."')";
		 $flag = true;
		// addToLeadmaster( $data);
	} else if ($submited['title'] == "Contact Page Form") {

		  $data['lp_ContactFirstName'] = $submited['posted_data']['text-61'];
		  $data['p_ContactLastName'] = $submited['posted_data']['text-559'];
		  $data['lp_Company'] = $submited['posted_data']['text-519'];
		  $data['lp_Email'] = $submited['posted_data']['email-53'];
		  $data['lp_Phone'] = $submited['posted_data']['text-388'];
		  $data['lp_Zip'] = $submited['posted_data']['text-235'];
		  $data['lp_State'] = $submited['posted_data']['menu-561'];
		  $data['lp_Comments'] = $submited['posted_data']['textarea-388'];

		  $sql = "INSERT INTO quote_data (`contact_name`,`company_name`, `email`, `phone`,`state`,`postcode`,`time`, `date`,`year`,`source`, `enquiry`) values
		  	     		        ('".$data['lp_ContactFirstName']." ".$data['p_ContactLastName']."','". $data['lp_Company']."','".$data['lp_Email']."','". $data['lp_Phone']."',"
		  	     		        ."'".$data['lp_State']."','".$data['lp_Zip']."','$time','$date','$year','$source', '".$data['lp_Comments']."')";
		  $flag = true;
		 // addToLeadmaster( $data);

	} else if ($submited['title'] == "Free Consultation") {

		 $data['lp_ContactFirstName'] = $submited['posted_data']['text-229'];
		 $data['lp_ContactLastName'] = $submited['posted_data']['text-328'];
		 $data['lp_Company'] = $submited['posted_data']['text-263'];
		 $data['lp_Email'] = $submited['posted_data']['email-434'];
		 $data['lp_Phone'] = $submited['posted_data']['tel-770'];
		 $data['lp_Zip'] = $submited['posted_data']['text-325'];
		 $data['lp_Comments'] = $submited['posted_data']['textarea-217'];

		 $sql = "INSERT INTO quote_data (`contact_name`,`company_name`, `email`, `phone`,`postcode`,`time`, `date`,`year`,`source`, `enquiry`) values
		  	     		        ('".$data['lp_ContactFirstName']." ".$data['lp_ContactLastName']."','".$data['lp_Company']."','".$data['lp_Email']."','". $data['lp_Phone']."','".$data['lp_Zip']."','$time','$date','$year','$source', '".$data['lp_Comments']."')";
		 // addToLeadmaster( $data);
		  $flag = true;

	} else if ($submited['title'] == "Live chat form") {


		 $data['lp_ContactFirstName'] = $submited['posted_data']['text-196'];
		 $data['lp_ContactLastName'] = $submited['posted_data']['text-398'];
		 $data['lp_Company'] = $submited['posted_data']['text-783'];
		 $data['lp_Address1'] = $submited['posted_data']['text-941'];
		 $data['lp_Email'] = $submited['posted_data']['email-492'];
		 $data['lp_Phone'] = $submited['posted_data']['tel-622'];
		 $data['lp_State'] = $submited['posted_data']['menu-140'];
		 $data['lp_City'] = $submited['posted_data']['text-699'];
		 $data['wl_numlines'] = $submited['posted_data']['text-93'];
		 $data['wl_phonebrand'] = $submited['posted_data']['phone_system'];
		 $data['wl_currprov'] = $submited['posted_data']['CurrentPhoneProvider'];
		 $data['wl_incontract'] = implode(" ",$submited['posted_data']['radio-420']);
		 $data['wl_numhandset'] = $submited['posted_data']['text-603'];
		 $data['wl_agesystem'] = $submited['posted_data']['text-66'];
		 $data['lp_Comments'] = $submited['posted_data']['textarea-634'];

                foreach ($submited['posted_data']['checkbox-760'] as $item) {
                    switch ($item) {
                        case "Phone System":
                            $data['wl_inpho '] = 'Yes';
                            break;
                        case "Carriage/lines only":
                            $data['wl_incar'] = 'Yes';
                            break;
                        case "Copiers":
                            $data['wl_incop'] = 'Yes';
                            break;
                        case "Security Cameras":
                            $data['wl_insec'] = 'Yes';
                            break;
                        case "Internet":
                            $data['wl_inint'] = 'Yes';
                            break;
                        case "Mobiles":
                            $data['wl_inmob'] = 'Yes';
                            break;
                        default:
                            break;
                    }
                }


		$sql = "INSERT INTO quote_data (`contact_name`,`company_name`, `email`, `phone`,`city`,`state`,`time`, `date`,`year`,`source`, `enquiry`) values
		  	     		        ('".$data['lp_ContactFirstName']." ".$data['lp_ContactLastName']."','". $data['lp_Company']."','".$data['lp_Email']."','". $data['lp_Phone']."','".$data['lp_City']."', '".$data['lp_State']."','$time','$date','$year','$source', '".$data['lp_Comments']."')";

                 addToLeadmaster( $data);
		 $flag = true;
	} else if ($submited['title'] == "Speed check form") {

		 $data['lp_ContactFirstName'] = $submited['posted_data']['text-179'];
		 $data['lp_ContactLastName'] = $submited['posted_data']['text-515'];
		 $data['lp_Address1'] = $submited['posted_data']['text-742'];
		 $data['lp_Company'] = $submited['posted_data']['text-464'];
		 $data['lp_Email'] = $submited['posted_data']['email-677'];
		 $data['lp_Phone'] = $submited['posted_data']['tel-777'];
		 $data['lp_Zip'] = $submited['posted_data']['text-45'];
		 $data['lp_City'] = $submited['posted_data']['text-263'];

		 $sql = "INSERT INTO quote_data (`contact_name`,`company_name`, `email`, `phone`,`postcode`,`city`,`time`, `date`,`year`,`source`) values
		  	     		        ('".$data['lp_ContactFirstName']." ".$data['lp_ContactLastName']."','".$data['lp_Company']."','".$data['lp_Email']."','". $data['lp_Phone']."','".$data['lp_Zip']."','".$data['lp_City']."','$time','$date','$year','$source')";
		 $flag = true;
		//  addToLeadmaster( $data);

	} else if ($submited['title'] == "Register Interest Form") {

		 $data['lp_ContactFirstName'] = $submited['posted_data']['text-798'];
		 $data['lp_ContactLastName'] = $submited['posted_data']['text-888'];
		 $data['lp_Company'] = $submited['posted_data']['text-408'];
		 $data['lp_Email'] = $submited['posted_data']['email-370'];
		 $data['lp_Phone'] = $submited['posted_data']['tel-343'];
		 $data['lp_State'] = $submited['posted_data']['menu-879'];
		 $data['lp_City'] = $submited['posted_data']['text-82'];
		 $data['lp_Zip'] = $submited['posted_data']['text-205'];

		 $sql = "INSERT INTO quote_data (`contact_name`,`company_name`, `email`, `phone`,`postcode`,`city`,`state`,`time`, `date`,`year`,`source`) values
		  	     		        ('".$data['lp_ContactFirstName']." ".$data['lp_ContactLastName']."','".$data['lp_Company']."','".$data['lp_Email']."','". $data['lp_Phone']."','".$data['lp_Zip']."','".$data['lp_City']."','".$data['lp_State']."', '$time','$date','$year','$source')";
		//  addToLeadmaster( $data);
		  $flag = true;
	}  else if ($submited['title'] == "Budget Form") {

		 $data['lp_ContactFirstName'] = $submited['posted_data']['text-165'];
		 $data['lp_ContactLastName'] = $submited['posted_data']['text-809'];
		 $data['lp_Company'] = $submited['posted_data']['text-37'];
		 $data['lp_Email'] = $submited['posted_data']['email-272'];
		 $data['lp_Phone'] = $submited['posted_data']['tel-629'];
		 $data['lp_Zip'] = $submited['posted_data']['text-236'];
		 $data['lp_Comments']  = $submited['posted_data']['textarea-654'];
		 $sql = "INSERT INTO quote_data (`contact_name`,`company_name`, `email`, `phone`,`postcode`,`time`, `date`,`year`,`source`,`enquiry`) values
		  	     		        ('".$data['lp_ContactFirstName']." ".$data['lp_ContactLastName']."','".$data['lp_Company']."','".$data['lp_Email']."','". $data['lp_Phone']."','".$data['lp_Zip']."','$time','$date','$year','$source','$enquiry')";
		// addToLeadmaster( $data);
		 $flag = true;
	} else if ($submited['title'] == "self-gen form TM") {

		 $data['lp_ContactFirstName'] = $submited['posted_data']['text-11'];
		 $data['lp_ContactLastName'] = $submited['posted_data']['text-432'];
		 $data['lp_Company'] = $submited['posted_data']['text-148'];
		 $data['lp_Email'] = $submited['posted_data']['email-888'];
		 $data['lp_Phone'] = $submited['posted_data']['tel-268'];
                 $data['lp_City'] = $submited['posted_data']['text-328'];
		 $data['lp_Zip'] = $submited['posted_data']['text-443'];
                  $data['lp_State'] = $submited['posted_data']['menu-289'];
		 $data['lp_Comments']  = $submited['posted_data']['textarea-227'];
                 $source = $submited['posted_data']['menu-979'];
		 $sql = "INSERT INTO quote_data (`contact_name`,`company_name`, `email`, `phone`,`postcode`,`city`,`state`,`time`, `date`,`year`,`source`) values
		  	     		        ('".$data['lp_ContactFirstName']." ".$data['lp_ContactLastName']."','".$data['lp_Company']."','".$data['lp_Email']."','". $data['lp_Phone']."','".$data['lp_Zip']."','".$data['lp_City']."','".$data['lp_State']."', '$time','$date','$year','$source')";
		// addToLeadmaster( $data);
		 $flag = true;
	}
	if ($flag) {
		$retval = mysql_query( $sql, $link );
		if(! $retval )
			{
		  		die('Could not enter data: ' . mysql_error());
			}


	}

	mysql_close($link);

    }
}

function addToLeadmaster( $data)
{
 // posting url
 $posting_url = "http://www.crmtool.net/lp_NewLead.asp?";
 // workgroup identifier
 $posting_url .= "lp_CompanyID=12498";
 // lead provider username and password
 $posting_url .= "&lp_Username=NexgenWeb";
 $posting_url .= "&lp_Password=pDqEXCN2C35f";
 // lead data

 foreach ($data  as $i=>$item) {

 	$posting_url .= "&".$i."=".urlencode($item);
 }

 $curl = curl_init();
 curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $posting_url

));
$resp = curl_exec($curl);

// TODO test return response
// If this function is using somewhere else, revert this changes and make a copy for new forms
return $resp;

//var_dump($resp);

curl_close($curl);
die;

}

if ( ! function_exists( 'nexgen_enqueue_scripts_and_styles' )){
	function nexgen_enqueue_scripts_and_styles() {
		wp_register_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
		wp_register_style( 'nexgen-form-css', get_template_directory_uri() . '/css/form.css', array( 'font-awesome' ) );
		wp_register_script( 'jquery-steps', get_template_directory_uri() . '/js/jquery.steps.internal.js', array( 'jquery' ), '1.1.0', true );
		wp_register_script( 'nexgen-form-js', get_template_directory_uri() . '/js/form.js', array( 'jquery', 'jquery-steps' ), '0.1', true );

		wp_enqueue_style( 'nexgen-form-css' );
		wp_enqueue_script( 'nexgen-form-js' );

		wp_localize_script( 'nexgen-form-js', 'ajax_var', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'nonce_quote_form' )
		));
	}
}
add_action( 'wp_enqueue_scripts', 'nexgen_enqueue_scripts_and_styles' );

function ajax_quote_form() {
	try {
		if( isset( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], 'nonce_quote_form' )){
			$sent_email_notification = nexgen_email_confirmation( $_POST );
			// response from addToLeadmaster forwarding as response to ajax post - need to be positive in order to thank you step to show
			$response = nexgen_data_handling( $_POST );
			if( $response === true ){
				// nexgen_email_confirmation( $_POST );
				nexgen_return_json_msg( $sent_email_notification, 200 );
			} else {
				nexgen_return_json_msg( $sent_email_notification, 500 );
			}
		} else {
			throw new Exception('You don\'t have access to this action');
		}
	} catch (Exception $e){
		nexgen_return_json_msg($e->getMessage(), 500);
	}

	wp_die();
}

add_action( 'wp_ajax_nexgen_quote_form', 'ajax_quote_form' );

function nexgen_data_handling( $form ){

	$data = array();
	$data['lp_ContactFirstName'] = sanitize_text_field( $form['first_name'] );
	$data['lp_ContactLastName'] = sanitize_text_field( $form['last_name'] );
	$data['lp_Email'] = sanitize_email( $form['busines_email'] );
	$data['lp_Phone'] = (int)$form['phone_number'];
	$data['lp_Zip'] = (int)$form['postcode'];
	$data['lp_Company'] = sanitize_text_field( $form['busines_name'] );
	$data['wl_numhandset'] = (int)$form['busines_phone_handsets']; // not in sql?
	$source = 5; // number represent "WEB-Nexgen"
	$data = array();
	$data['lp_LeadSource'] = $source;
	//setting the keword fetched from the url.
	//if(isset($_COOKIE['keyword'])) {
	//$data['wl_keyword'] = $_COOKIE['keyword'];
	if(isset($_COOKIE['uniqueid'])) { 							//also tried CampaignID
		$data['lp_UniqueID'] = $_COOKIE['uniqueid'];
		if ($form['business_solution_1']) {
			$data['wl_typeofsol'] = 'New business phone system';
		}
		if ($form['business_solution_2']) {
			$data['wl_typeofsol'] = 'Upgrade existing phone system';
		}
		if ($form['business_solution_3']) {
			$data['wl_typeofsol'] = 'Printers & copiers';
		}
		if ($form['business_solution_4']) {
			$data['wl_typeofsol'] = 'Security & conferencing';
		}
		if ($form['business_solution_5']) {
			$data['wl_typeofsol'] = 'Internet & phone plans';
		}
		if ($form['business_solution_6']) {
			$data['wl_typeofsol'] = 'Equipment finance';
		}
		if ($form['enquiry_reasons_1']) {
			$data['wl_reasonenq'] = 'Expanding business';
		}
		if ($form['enquiry_reasons_2']) {
			$data['wl_reasonenq'] = 'Moving premises';
		}
		if ($form['enquiry_reasons_3']) {
			$data['wl_reasonenq'] = 'Get NBN ready';
		}
		if ($form['enquiry_reasons_4']) {
			$data['wl_reasonenq'] = 'Cost reduction';
		}
		if ($form['enquiry_reasons_5']) {
			$data['wl_reasonenq'] = 'Transition to PABX od VOIP';
		}
		if ($form['enquiry_reasons_6']) {
			$data['wl_reasonenq'] = 'Upgrading technology';
		}
		if ($form['enquiry_reasons_7']) {
			$data['wl_reasonenq'] = 'Trade-in/Cash-back';
		}
		if ($form['newsletter']) {
			$data['wl_marketingper'] = 'checked';
		}
	}

/*
// maybe try this approach instead

    $checkboxes = array(
 		'business_solution_1' => 'New business phone system',
		'business_solution_2' => 'Upgrade existing phone system',
 		'business_solution_3' => 'Printers & copiers',
 		'business_solution_4' => 'Security & conferencing',
		'business_solution_5' => 'Internet & phone plans',
 		'business_solution_6' => 'Equipment finance',
		'enquiry_reasons_1' => 'Expanding business',
		'enquiry_reasons_2' => 'Moving premises',
		'enquiry_reasons_3' => 'Get NBN ready',
 		'enquiry_reasons_4' => 'Cost reduction',
 		'enquiry_reasons_5' => 'Transition to PABX od VOIP',
 		'enquiry_reasons_6' => 'Upgrading technology',
 		'enquiry_reasons_7' => 'Trade-in/Cash-back',
		'newsletter'
  	);

	foreach( $checkboxes as $key => $name ){
 		if( isset( $form[$key] ) && $form[$key] ){
			if( strpos( $key, 'business_solution_' ) !== FALSE ){
				$data['wl_typeofsol'][] = $name;
			}
			if( strpos( $key, 'enquiry_reasons_' ) !== FALSE ){
				$data['wl_reasonenq'][] = $name;
			}
			if( $key == 'newsletter' ){
				$data['wl_marketingper'] = 'checked';
			}
		}
	}

	$data['wl_typeofsol'] = maybe_serialize( $data['wl_typeofsol'] );
	$data['wl_reasonenq'] = maybe_serialize( $data['wl_reasonenq'] );

*/
			$sql = "INSERT INTO quote_data (`contact_name`, `email`, `phone`,`postcode`, `company_name`, `time`, `date`,`year`,`source`, `enquiry`) values
	 											('".$data['lp_ContactFirstName']." ".$data['p_ContactLastName']."','".$data['lp_Email']."','".$data['lp_Phone']."','".$data['lp_Zip']."','". $data['lp_Company']."',"
	 																							. "'$time','$date','$year','$source','".$data['lp_Comments']."')";
										addToLeadmaster( $data);
										$flag = true;


	// 	}
	//
	//
	// $data['???'] = (int)$form['enquiry_reasons_others'];
	//
	// addToLeadmaster should return response fron curl instead of dumping it
	// $insert = addToLeadmaster( $data);
	// // TODO: uncomment above line when ready for tests
	// $insert = true;
	// return $insert;

}

function nexgen_email_confirmation( $data ) {

	$headers = "From NexGen " . $data['source'] . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$content = '';

    $checkboxes = array(
 		'business_solution_1' => 'New business phone system',
		'business_solution_2' => 'Upgrade existing phone system',
 		'business_solution_3' => 'Printers & copiers',
 		'business_solution_4' => 'Security & conferencing',
		'business_solution_5' => 'Internet & phone plans',
 		'business_solution_6' => 'Equipment finance',
		'enquiry_reasons_1' => 'Expanding business',
		'enquiry_reasons_2' => 'Moving premises',
		'enquiry_reasons_3' => 'Get NBN ready',
 		'enquiry_reasons_4' => 'Cost reduction',
 		'enquiry_reasons_5' => 'Transition to PABX od VOIP',
 		'enquiry_reasons_6' => 'Upgrading technology',
 		'enquiry_reasons_7' => 'Trade-in/Cash-back'
  	);

	$emails = array(
		'margotdavis@nexgen.com.au',
		'bradArgaet@nexgen.com.au',
		'william@jimmydata.com'
	);

	foreach( $data as $key => $val ){
		if( in_array( $key, array( 'action', 'source', 'nonce' ) ) ){
			continue;
		}
		if( array_key_exists( $key, $checkboxes ) ){
			$content .= $checkboxes[$key] . '<br />';
		} else {
			$content .= $key . ': ' . $val . '<br />';
		}
	}

	if( $data['source'] == 'front-page-form' ){
		return wp_mail( $emails, 'QUOTE FORM : NX_WEBFORM@NEXGEN.COM.AU', $content, $headers );
	} elseif( $data['source'] == 'full-page-form' ){
		return wp_mail( $emails, 'LANDING PAGEFORM : NX_WEBFORM@NEXGEN.COM.AU', $content, $headers );
	} else {
		return 'wrong source';
	}
}

function nexgen_return_json_msg( $message, $status = 200 ) {
	header('Content-Type: application/json');
	$response = new stdClass();
	$response -> status = $status;
	$response -> msg = $message;
	echo json_encode($response);
	wp_die();
}
