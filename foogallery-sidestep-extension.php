<?php
/**
 * FooGallery Sidestep Extension
 *
 * Simple sidescrolling gallery
 *
 * @package   Sidestep_Template_FooGallery_Extension
 * @author     Christian Stengel
 * @license   GPL-2.0+
 * @link      http://www.efactory.de
 * @copyright 2015  Christian Stengel
 *
 * @wordpress-plugin
 * Plugin Name: FooGallery - Sidestep
 * Description: Simple sidescrolling gallery
 * Version:     1.1.0
 * Author:       Christian Stengel
 * Author URI:  http://www.efactory.de
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( !class_exists( 'Sidestep_Template_FooGallery_Extension' ) ) {

	define('SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION_URL', plugin_dir_url( __FILE__ ));
	define('SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION_VERSION', '1.1.0');

	require_once( 'foogallery-sidestep-init.php' );

	class Sidestep_Template_FooGallery_Extension {
		/**
		 * Wire up everything we need to run the extension
		 */
		function __construct() {
			add_filter( 'foogallery_gallery_templates', array( $this, 'add_template' ) );
			add_filter( 'foogallery_gallery_templates_files', array( $this, 'register_myself' ) );
			add_filter( 'foogallery_located_template-sidestep', array( $this, 'enqueue_dependencies' ) );
		}

		/**
		 * Register myself so that all associated JS and CSS files can be found and automatically included
		 * @param $extensions
		 *
		 * @return array
		 */
		function register_myself( $extensions ) {
			$extensions[] = __FILE__;
			return $extensions;
		}

		/**
		 * Enqueue any script or stylesheet file dependencies that your gallery template relies on
		 */
		function enqueue_dependencies() {
			//$js = SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'js/jquery.sidestep.js';
			//wp_enqueue_script( 'sidestep', $js, array('jquery'), SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION_VERSION );

			//$css = SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'css/sidestep.css';
			//wp_enqueue_style( 'sidestep', $css, array(), SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION_VERSION );
		}

		/**
		 * Add our gallery template to the list of templates available for every gallery
		 * @param $gallery_templates
		 *
		 * @return array
		 */
		function add_template( $gallery_templates ) {

			$gallery_templates[] = array(
				'slug'        => 'sidestep',
				'name'        => __( 'Sidestep', 'foogallery-sidestep'),
				'preview_css' => SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'css/gallery-sidestep.css',
				'admin_js'	  => SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'js/admin-gallery-sidestep.js',
				'fields'	  => array(
					array(
						'id'      => 'thumbnail_size',
						'title'   => __('Thumbnail Size', 'foogallery-sidestep'),
						'desc'    => __('Choose the size of your thumbs.', 'foogallery-sidestep'),
						'type'    => 'thumb_size',
						'default' => array(
							'width' => get_option( 'thumbnail_size_w' ),
							'height' => get_option( 'thumbnail_size_h' ),
							'crop' => true
						)
					),
					array(
						'id'      => 'thumbnail_link',
						'title'   => __('Thumbnail Link', 'foogallery-sidestep'),
						'default' => 'image' ,
						'type'    => 'thumb_link',
						'spacer'  => '<span class="spacer"></span>',
						'desc'	  => __('You can choose to either link each thumbnail to the full size image or to the image\'s attachment page.', 'foogallery-sidestep')
					),
					array(
						'id'      => 'lightbox',
						'title'   => __('Lightbox', 'foogallery-sidestep'),
						'desc'    => __('Choose which lightbox you want to use in the gallery.', 'foogallery-sidestep'),
						'type'    => 'lightbox'
					),
					array(
						'id'      => 'alignment',
						'title'   => __('Gallery Alignment', 'foogallery-sidestep'),
						'desc'    => __('The horizontal alignment of the thumbnails inside the gallery.', 'foogallery-sidestep'),
						'default' => 'alignment-center',
						'type'    => 'select',
						'choices' => array(
							'alignment-left' => __( 'Left', 'foogallery-sidestep' ),
							'alignment-center' => __( 'Center', 'foogallery-sidestep' ),
							'alignment-right' => __( 'Right', 'foogallery-sidestep' )
						)
					),
     array(
      'id'      => 'captions',
      'title'   => __('Image captions', 'foogallery-sidestep'),
      'desc'    => __('Displays the albums image caption on mouse over.', 'foogallery-sidestep'),
      'default' => 'no',
      'type'    => 'radio',
      'spacer'  => '<span class="spacer"></span>',
      'choices' => array(
       'no' => __( 'Don\'t show captions', 'foogallery-sidestep' ),
       'yes' => __( 'Show captions', 'foogallery-sidestep' )
      )
     )     
					//available field types available : html, checkbox, select, radio, textarea, text, checkboxlist, icon
					//an example of a icon field used in the default gallery template
					//array(
					//	'id'      => 'border-style',
					//	'title'   => __('Border Style', 'foogallery-sidestep'),
					//	'desc'    => __('The border style for each thumbnail in the gallery.', 'foogallery-sidestep'),
					//	'type'    => 'icon',
					//	'default' => 'border-style-square-white',
					//	'choices' => array(
					//		'border-style-square-white' => array('label' => 'Square white border with shadow', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-square-white.png'),
					//		'border-style-circle-white' => array('label' => 'Circular white border with shadow', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-circle-white.png'),
					//		'border-style-square-black' => array('label' => 'Square Black', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-square-black.png'),
					//		'border-style-circle-black' => array('label' => 'Circular Black', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-circle-black.png'),
					//		'border-style-inset' => array('label' => 'Square Inset', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-square-inset.png'),
					//		'border-style-rounded' => array('label' => 'Plain Rounded', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-plain-rounded.png'),
					//		'' => array('label' => 'Plain', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-none.png'),
					//	)
					//),
				)
			);

			return $gallery_templates;
		}
	}
}