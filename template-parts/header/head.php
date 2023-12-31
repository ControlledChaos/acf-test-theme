<?php
/**
 * The default head section
 *
 * @package    BS_Theme
 * @subpackage Templates
 * @category   Headers
 * @since      1.0.0
 */

namespace BS_Theme;

?>
<head id="<?php echo esc_attr( get_bloginfo( 'url' ) ); ?>" data-template-set="<?php echo esc_attr( get_template() ); ?>">

	<meta charset="<?php esc_attr( bloginfo( 'charset' ) ); ?>">
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php if ( is_singular() && pings_open() ) {
		echo sprintf( '<link rel="pingback" href="%s" />', esc_attr( get_bloginfo( 'pingback_url' ) ) );
	} ?>

	<link href="<?php echo esc_attr( $canonical ); ?>" rel="canonical" />

	<?php if ( is_search() ) { echo '<meta name="robots" content="noindex,nofollow" />'; } ?>

	<link rel="preconnect" href="//fonts.adobe.com" />
	<link rel="preconnect" href="//fonts.google.com" />
	<link rel="preconnect" href="//fonts.gstatic.com" />

	<?php
	// Hook into the head.
	do_action( 'before_wp_head' );
	wp_head();
	do_action( 'after_wp_head' );
	?>

</head>
