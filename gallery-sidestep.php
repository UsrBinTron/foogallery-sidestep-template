<?php
/**
 * FooGallery Sidestep gallery template
 * This is the template that is run when a FooGallery shortcode is rendered to the frontend
 */
//the current FooGallery that is currently being rendered to the frontend
global $current_foogallery;
//the current shortcode args
global $current_foogallery_arguments;
//get our thumbnail sizing args
$args = foogallery_gallery_template_setting( 'thumbnail_size', 'thumbnail' );
//add the link setting to the args
$args['link'] = foogallery_gallery_template_setting( 'thumbnail_link', 'image' );
//add the link setting to the args
$args['captions'] = foogallery_gallery_template_setting( 'captions', 'unknown' );
//get which lightbox we want to use
$lightbox = foogallery_gallery_template_setting( 'lightbox', 'unknown' );

?>

<div id="foogallery-gallery-<?php echo $current_foogallery->ID; ?>" class="foogallery-container foogallery-sidestep foogallery-lightbox-<?php echo esc_attr($lightbox); ?><?PHP echo $args["captions"]=='yes'?' foogallery-sidestep-captions':''; ?>">
	<?php foreach ( $current_foogallery->attachments() as $attachment ) {
		echo $attachment->html( $args );
	} ?>
</div>