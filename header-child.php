<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till div#breadcrumb
 *
 * @package MIT_Libraries_Parent
 * @since 1.2.1
 */

?>
<?php
if ( get_option( 'menu_style_setting' ) === 'slim' ) {
	get_header( 'slim' );
} else {
	get_header();
}
