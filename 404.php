<?php
/**
 * 404 error template
 *
 * Used if the requested permalink is not found (404 error).
 *
 * @package    BS_Theme
 * @subpackage Templates
 * @category   Errors
 * @since      1.0.0
 */

namespace BS_Theme;

// Alias namespaces.
use BS_Theme\Classes\Front as Front;

// Access widgets to check if they're registered.
global $wp_widget_factory;

get_header();

?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" itemscope itemprop="mainContentOfPage">

			<section class="error-404 not-found">

				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'That page can\'t be found.', 'bs-theme' ); ?></h1>
				</header>

				<div class="page-content">

					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bs-theme' ); ?></p>

					<?php
					get_search_form();

					if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Posts'] ) ) {
						the_widget( 'WP_Widget_Recent_Posts' );
					} ?>

					<div class="widget widget_categories">

						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'bs-theme' ); ?></h2>

						<ul>
							<?php
							wp_list_categories( [
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							] );
							?>
						</ul>
					</div>
					<?php

					$archive_content = sprintf(
						'<p>%1s</p>',
						esc_html__( 'Try looking in the monthly archives.', 'bs-theme' )
					);

					if ( isset( $wp_widget_factory->widgets['WP_Widget_Archives'] ) ) {
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					}

					if ( isset( $wp_widget_factory->widgets['WP_Widget_Tag_Cloud'] ) ) {
						the_widget( 'WP_Widget_Tag_Cloud' );
					}

					?>
				</div>
			</section>
		</main>
	</div>
</div>
<?php

get_footer();
