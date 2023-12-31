<?php
/**
 * Contains the post embed header template
 *
 * @package    BS_Theme
 * @subpackage Templates
 * @category   Footers
 * @since      1.0.0
 */

if ( ! headers_sent() ) {
	header( 'X-WP-embed: true' );
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title><?php echo wp_get_document_title(); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<?php do_action( 'embed_head' ); ?>
	<?php do_action( 'bst_embed_head' ); ?>
</head>
<body <?php body_class(); ?>>
