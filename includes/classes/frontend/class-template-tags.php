<?php
/**
 * Frontend template tags
 *
 * Call new instance of this class in header files.
 * Use of the `$bst_tags` variable is recommended
 * to instantiate, where the prefix matches the
 * rest of this theme's prefixes.
 *
 * @package    BS_Theme
 * @subpackage Classes
 * @category   Frontend
 * @since      1.0.0
 */

namespace BS_Theme\Classes\Front;

// Alias namespaces.
use BS_Theme\Classes\Vendor as Vendor;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Template_Tags {

	/**
	 * The class object
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected static $class_object;

	/**
	 * Instance of the class
	 *
	 * This method can be used to call an instance
	 * of the class from outside the class.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns an instance of the class.
	 */
	public static function instance() {

		if ( is_null( self :: $class_object ) ) {
			self :: $class_object = new self();
		}

		// Return the instance.
		return self :: $class_object;
	}

	/**
	 * Constructor magic method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {}

	/**
	 * Load the `<head>` section
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function head() {
		do_action( 'BS_Theme\head' );
	}

	/**
	 * Additional hook for scripts & styles
	 *
	 * Triggered after the opening `<body>` tag.
	 *
	 * @link https://make.wordpress.org/themes/2019/03/29/addition-of-new-wp_body_open-hook/
	 * @link https://developer.wordpress.org/reference/functions/wp_body_open/
	 */
	public function body_open() {
		do_action( 'wp_body_open' );
		do_action( 'BS_Theme\body_open' );
	}

	/**
	 * Load the page header
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function header() {
		do_action( 'BS_Theme\header' );
	}

	/**
	 * Load the page sidebar
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function sidebar() {
		do_action( 'BS_Theme\sidebar' );
	}

	/**
	 * Load the search form
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function searchform() {
		do_action( 'BS_Theme\searchform' );
	}

	/**
	 * Load the page footer
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function footer() {
		do_action( 'BS_Theme\footer' );
	}

	/**
	 * Open template tags
	 *
	 * Following are template tags which may be used
	 * by this theme and are provided for further
	 * development by the theme author, child themes,
	 * or plugins.
	 *
	 * These are named generically since template part
	 * of various types may be loaded.
	 *
	 * @todo Possibly add more open tags but perhaps not,
	 *       as this is a starter theme.
	 *
	 * @since  1.0.0
	 * @access public
	 */

	// Fires after opening `body` and before `#page`.
	public function before_page() {
		do_action( 'BS_Theme\before_page' );
	}

	// Fires before `BS_Theme\header`.
	public function before_header() {
		do_action( 'BS_Theme\before_header' );
	}

	// Fires after `BS_Theme\header`.
	public function after_header() {
		do_action( 'BS_Theme\after_header' );
	}

	// Fires before `BS_Theme\sidebar`.
	public function before_sidebar() {
		do_action( 'BS_Theme\before_sidebar' );
	}

	// Fires after `BS_Theme\sidebar`.
	public function after_sidebar() {
		do_action( 'BS_Theme\after_sidebar' );
	}

	// Fires before `BS_Theme\searchform`.
	public function before_searchform() {
		do_action( 'BS_Theme\before_searchform' );
	}

	// Fires after `BS_Theme\searchform`.
	public function after_searchform() {
		do_action( 'BS_Theme\after_searchform' );
	}

	// Fires before `BS_Theme\footer`.
	public function before_footer() {
		do_action( 'BS_Theme\before_footer' );
	}

	// Fires after `BS_Theme\footer`.
	public function after_footer() {
		do_action( 'BS_Theme\after_footer' );
	}

	// Fires after `#page` and before `wp_footer`.
	public function after_page() {
		do_action( 'BS_Theme\after_page' );
	}

	/**
	 * Site Schema
	 *
	 * Conditional Schema attributes for `<div id="page"`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the relevant itemtype.
	 */
	public function site_schema() {

		// Change page slugs and template names as needed.
		if ( is_page( 'about' ) || is_page( 'about-us' ) || is_page_template( 'page-about.php' ) || is_page_template( 'about.php' ) ) {
			$itemtype = esc_attr( 'AboutPage' );
		} elseif ( is_page( 'contact' ) || is_page( 'contact-us' ) || is_page_template( 'page-contact.php' ) || is_page_template( 'contact.php' ) ) {
			$itemtype = esc_attr( 'ContactPage' );
		} elseif ( is_page( 'faq' ) || is_page( 'faqs' ) || is_page_template( 'page-faq.php' ) || is_page_template( 'faq.php' ) ) {
			$itemtype = esc_attr( 'QAPage' );
		} elseif ( is_page( 'cart' ) || is_page( 'shopping-cart' ) || is_page( 'checkout' ) || is_page_template( 'cart.php' ) || is_page_template( 'checkout.php' ) ) {
			$itemtype = esc_attr( 'CheckoutPage' );
		} elseif ( is_front_page() || is_page() ) {
			$itemtype = esc_attr( 'WebPage' );
		} elseif ( is_author() || is_plugin_active( 'buddypress/bp-loader.php' ) && bp_is_home() || is_plugin_active( 'bbpress/bbpress.php' ) && bbp_is_user_home() ) {
			$itemtype = esc_attr( 'ProfilePage' );
		} elseif ( is_search() ) {
			$itemtype = esc_attr( 'SearchResultsPage' );
		} else {
			$itemtype = esc_attr( 'Blog' );
		}

		// Print the Schema itemtype.
		echo $itemtype;
	}

	/**
	 * Site logo
	 *
	 * @since  1.0.0
	 * @access public
	 * @return mixed Returns the logo markup or null.
	 */
	public function site_logo( $html = null ) {

		// Get the custom logo URL.
		$logo = get_theme_mod( 'custom_logo' );
		$src  = wp_get_attachment_image_src( $logo , 'full' );

		// Markup if a logo has been set.
		if ( has_custom_logo( get_current_blog_id() ) ) {

			$html = '<div class="site-logo">';

			// Do not link if on the front page.
			if ( is_front_page() ) {

				$html .= sprintf(
					'<img src="%s" />',
					esc_attr( esc_url( $src[0] ) )
				);

			// Linked markup.
			} else {

				$html .= sprintf(
					'<a href="%s"><img src="%s" /></a>',
					esc_attr( esc_url( get_bloginfo( 'url' ) ) ),
					esc_attr( esc_url( $src[0] ) )
				);
			}
			$html .= '</div>';
		}

		// Return the logo markup or null.
		return $html;
	}

	/**
	 * Content part
	 *
	 * Get the template part for content by
	 * post type and with ACF filename suffix
	 * if ACF is active.
	 */
	public function content_template() {

		// Instantiate ACF class to get the suffix.
		$acf = new Vendor\Theme_ACF;

		// Post query arguments to look for published posts.
		$args = apply_filters( 'bst_content_template_query', [
			'post_status' => [ 'publish' ],
		] );

		// New query, namespace escaped with backslash.
		$query = new \WP_Query( $args );

		// If the query has at least one post.
		if ( $query->have_posts() ) {

			// Static front page template.
			if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {
				$template = 'content-front-page' . $acf->suffix();

			// Look for `content-{$post-type}.php` template.
			} else {
				$template = 'content-' . get_post_type() . $acf->suffix();
			}

		// If the query has no posts.
		} else {
			$template = 'content-none' . $acf->suffix();
		}

		// Look for a specific template as applied above.
		$locate = locate_template( 'template-parts/content/' . $template . '.php' );

		// Use the specific template if found.
		if ( $locate ) {
			$template = $template;

		// Default to generic template ( always for post type: post ).
		} else {
			$template = 'content' . $acf->suffix();
		}

		// Apply a filter for unforeseen conditions.
		$template = apply_filters( 'bst_content_template', $template );

		// Get the content template part.
		return get_template_part( 'template-parts/content/' . $template );
	}

	/**
	 * Posted on
	 *
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the date posted.
	 */
	public function posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'bs-theme' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}

	/**
	 * Posted by
	 *
	 * Prints HTML with meta information for the current author.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the author name.
	 */
	public function posted_by() {

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'bs-theme' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}

	/**
	 * Entry footer
	 *
	 * Prints HTML with meta information for the categories, tags and comments.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns various post-related links.
	 */
	public function entry_footer() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			$categories_list = get_the_category_list( esc_html__( ', ', 'bs-theme' ) );
			if ( $categories_list ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'bs-theme' ) . '</span>', $categories_list );
			}

			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bs-theme' ) );

			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'bs-theme' ) . '</span>', $tags_list );
			}

		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bs-theme' ),
						[
							'span' => [
								'class' => [],
							],
						]
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					__( ' Edit <span class="screen-reader-text">%s</span>', 'bs-theme' ),
					[
						'span' => [
							'class' => [],
						],
					]
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);

	}

	/**
	 * Post thumbnail
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns HTML for the post thumbnail.
	 */
	public function post_thumbnail() {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		// Check for the large 16:9 video image size.
		if ( has_image_size( 'image-name' ) ) {
			$size = 'large-video';
		} else {
			$size = 'post-thumbnail';
		}

		// Thumbnail image arguments.
		$args = [
			'alt'  => '',
			'role' => 'presentation'
		];


		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( $size, $args ); ?>
			</div>

			<?php
		else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( $size, $args ); ?>
			</a>

			<?php
		endif;
	}

	/**
	 * Theme toggle script
	 *
	 * Toggles a body class and toggles the
	 * text of the toggle button.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return mixed
	 */
	public function theme_mode_script() {

	?>
		<script>jQuery(document).ready(function(e){var t=e('.theme-toggle');localStorage.theme?(e('body').addClass(localStorage.theme),e(t).text(localStorage.text)):(e('body').addClass('light-mode'),e(t).text('<?php esc_html_e( 'Dark Theme', 'bs-theme' ); ?>')),e(t).click(function(){e('body').hasClass('light-mode')?(e('body').removeClass('light-mode').addClass('dark-mode'),e(t).text('<?php esc_html_e( 'Light Theme', 'bs-theme' ); ?>'),localStorage.theme='dark-mode',localStorage.text='<?php esc_html_e( 'Light Theme', 'bs-theme' ); ?>'):(e('body').removeClass('dark-mode').addClass('light-mode'),e(t).text('<?php esc_html_e( 'Dark Theme', 'bs-theme' ); ?>'),localStorage.theme='light-mode',localStorage.text='<?php esc_html_e( 'Dark Theme', 'bs-theme' ); ?>')})});</script>
	<?php

	}

	/**
	 * Theme toggle functionality
	 *
	 * Prints the toggle button and adds the
	 * toggle script to the footer.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return mixed
	 */
	public function theme_mode() {

		// Add the toggle script to the footer.
		add_action( 'wp_footer', [ $this, 'theme_mode_script' ] );

		// Toggle button markup.
		$button = sprintf(
			'<button class="theme-toggle" type="button" name="dark_light" title="%1s">%2s</button>',
			esc_html__( 'Toggle light/dark theme', 'bs-theme' ),
			esc_html__( 'Light Theme', 'bs-theme' )
		);

		// Print the toggle button.
		echo $button;
	}

	/**
	 * Get header image alt attribute
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the text of the alt attribute.
	 */
	public function get_header_image_alt() {

		$attachment_id = 0;

		if ( is_random_header_image() && $header_url = get_header_image() ) {

			// For a random header search for a match against all headers.
			foreach ( get_uploaded_header_images() as $header ) {

				if ( $header['url'] == $header_url ) {
					$attachment_id = $header['attachment_id'];
					break;
				}
			}

		// For static headers, less intensive approach.
		} elseif ( $data = get_custom_header() ) {
			$attachment_id = $data->attachment_id;
		}

		// If an attachment ID is found.
		if ( $attachment_id ) {

			$alt = trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );

			// Fallback to caption (excerpt).
			if ( ! $alt ) {
				$alt = trim( strip_tags( get_post_field( 'post_excerpt', $attachment_id ) ) );
			}

			// Fallback to title.
			if ( ! $alt ) {
				$alt = trim( strip_tags( get_post_field( 'post_title', $attachment_id ) ) );
			}

		// Return an empty string if no alt could be found.
		} else {
			$alt = '';
		}

		return $alt;
	}

	/**
	 * Post navigation
	 *
	 * Next & previous navigation of singular post types.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	 public function post_navigation() {

		$prev = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $prev ) {
			return;
		}

		global $post;

		$post_id  = get_post_type( $post->ID );
		$get_type = get_post_type_object( $post_id );
		$type     = $get_type->labels->singular_name;

		// Post navigation labels.
		$prev_text = sprintf(
			'%s %s',
			__( 'Previous', 'spr-two' ),
			$type
		);

		$next_text = sprintf(
			'%s %s',
			__( 'Next', 'spr-two' ),
			$type
		);

		// Post navigation links.
		$next_url = get_permalink( $next );
		$prev_url = get_permalink( $prev );

		?>
		<nav class="post-navigation">

			<?php if ( $prev ) : ?>
			<a class="button nav-previous" href="<?php echo $prev_url; ?>" title="<?php echo get_the_title( $prev ); ?>"><?php echo $prev_text; ?></a>
			<?php endif; ?>

			<?php if ( $next ) : ?>
			<a class="button nav-next" href="<?php echo $next_url; ?>" title="<?php echo get_the_title( $next ); ?>"><?php echo $next_text; ?></a>
			<?php endif; ?>
		</nav>
		<?php
	}
}

/**
 * Instance of the class
 *
 * @since  1.0.0
 * @access public
 * @return object Template_Tags Returns an instance of the class.
 */
function tags() {
	return Template_Tags :: instance();
}
