<?php
//This init class is used to add the extension to the extensions list while you are developing them.
//When the extension is added to the supported list of extensions, this file is no longer needed.

if ( !class_exists( 'Sidestep_Template_FooGallery_Extension_Init' ) ) {
	class Sidestep_Template_FooGallery_Extension_Init {

		function __construct() {
			add_filter( 'foogallery_available_extensions', array( $this, 'add_to_extensions_list' ) );
		}

		function add_to_extensions_list( $extensions ) {
			$extensions[] = array(
				'slug'=> 'sidestep',
				'class'=> 'Sidestep_Template_FooGallery_Extension',
				'title'=> __('Sidestep', 'foogallery-sidestep'),
				'file'=> 'foogallery-sidestep-extension.php',
				'description'=> __('Simple sidescrolling gallery', 'foogallery-sidestep'),
				'author'=> ' Christian Stengel',
				'author_url'=> 'http://www.efactory.de',
				'thumbnail'=> SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION_URL . '/assets/extension_bg.png',
				'tags'=> array( __('template', 'foogallery') ),	//use foogallery translations
				'categories'=> array( __('Build Your Own', 'foogallery') ), //use foogallery translations
				'source'=> 'generated'
			);

			return $extensions;
		}
	}

	new Sidestep_Template_FooGallery_Extension_Init();
}