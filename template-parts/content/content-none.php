<?php
/**
 * Content template for no posts in blog, archives
 * or in search results
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
<div class="no-results not-found">

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'bs-theme' ); ?></h1>
	</header>

	<div class="page-content" itemprop="articleBody">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bs-theme' ),
					[
						'a' => [
							'href' => [],
						],
					]
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bs-theme' ); ?></p>
			<?php
			get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bs-theme' ); ?></p>
			<?php
			get_search_form();

		endif; ?>
	</div>

</div>
