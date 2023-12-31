<?php
/**
 * Template part for displaying page content in front-page.php
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
		<?php

		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header>

	<?php if ( is_singular() ) {
		if (
			! is_page_template( 'page-templates/no-featured.php' ) ||
			! is_page_template( 'page-templates/no-sidebar-no-featured.php' )
		) {
			Front\tags()->post_thumbnail();
		}
	} ?>

	<div class="entry-content" itemprop="articleBody">

		<?php

		the_content();

		wp_link_pages( [
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bs-theme' ),
			'after'  => '</div>',
		] );

		?>

	</div>

	<?php if ( is_single() ) :

	?>
	<footer class="entry-footer">
		<?php  Front\tags()->entry_footer(); ?>
	</footer>
	<?php

	endif; ?>

</article>
