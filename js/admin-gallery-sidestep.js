//Use this file to inject custom javascript behaviour into the foogallery edit page
//For an example usage, check out wp-content/foogallery/extensions/default-templates/js/admin-gallery-default.js

(function (SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION, $, undefined) {

	SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION.doSomething = function() {
		//do something when the gallery template is changed to sidestep
	};

	SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION.adminReady = function () {
		$('body').on('foogallery-gallery-template-changed-sidestep', function() {
			SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION.doSomething();
		});
	};

}(window.SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION = window.SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION || {}, jQuery));

jQuery(function () {
	SIDESTEP_TEMPLATE_FOOGALLERY_EXTENSION.adminReady();
});