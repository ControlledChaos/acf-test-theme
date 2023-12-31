<?php
/**
 * Content template for post type: page
 *
 * @package    BS_Theme
 * @subpackage Templates
 * @category   Content
 * @since      1.0.0
 */

namespace BS_Theme;

// Alias namespaces.
use BS_Theme\Classes\Front as Front;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php
	if (
		! is_page_template( 'page-templates/no-featured.php' ) ||
		! is_page_template( 'page-templates/no-sidebar-no-featured.php' )
	) {
		Front\tags()->post_thumbnail();
	}
	?>

	<div class="entry-content" itemprop="articleBody">

		<?php

		the_content();

		wp_link_pages( [
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bs-theme' ),
			'after'  => '</div>',
		] );

		?>

	</div>
</article>
