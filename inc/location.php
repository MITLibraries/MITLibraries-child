<?php
/**
 * The template for displaying location information for Doc Services.
 *
 * @package MIT_Libraries_Child
 * @since 2.0.0
 */

$docs = get_post( 1028 );
$docs_phone = get_post_meta( 1028, 'phone', true );
$docs_email = get_post_meta( 1028, 'email', true );
$docs_building = get_post_meta( 1028, 'building', true );
$docs_slug = $docs->post_name;

$map_page = '/locations/#!' . $docs_slug;

?>

<div class="info-more">
	<a href="tel:<?php echo esc_attr( $docs_phone ); ?>" class="phone"><?php echo esc_html( $docs_phone ); ?></a> |
	<?php if ( $docs_email ) : ?>
	<a href="mailto:<?php echo esc_attr( $docs_email ); ?>" class="email"><?php echo esc_html( $docs_email ); ?></a> |
	<?php endif; ?>
	<a href="<?php echo esc_attr( $map_page ); ?>">Room: <?php echo esc_html( $docs_building ); ?> <i class="icon-arrow-right"></i></a>
</div>
<div class="hours-today">
	<span>Today's Hours: <span data-location-hours="Document Services"></span></span>  | 
	<a href="/hours" class="link-hours-all">See all hours</a>
</div>
