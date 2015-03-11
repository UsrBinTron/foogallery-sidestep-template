//FooGallery Sidestep template script
//Add any javascript that will be needed by your gallery template. This will be output to the frontend

jQuery(function () {
 
   jQuery('.foogallery-sidestep-captions A').each(function() {
      var caption= jQuery(this).attr('data-caption-title');
      jQuery(this).attr('style','position: relative; display: inline-block;');
      if (!caption) return;
      jQuery(this).append('<span class="foogallery-sidestep-captions-caption" style="width: '+jQuery(this).find('img').width()+'px;">'+caption+'</span>');
   });
 
});