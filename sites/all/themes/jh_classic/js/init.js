Drupal.behaviors.pwControl = {
	attach: function (context, settings) {
		
		jQuery('#line-sheet-btn').click(function(){
			jQuery('#line-sheet-form').slideToggle(500);
		});
		
	}	
}


Drupal.behaviors.productInfo = {
	attach: function (context, settings) {
		
		/*
jQuery('.info li').click(function(){
			jQuery('.field-name-field-product-info-details', this).stop(true, true).slideToggle(500);
		});
*/
				
		jQuery('#edit-attributes-field-product-color option').each(function(index) {
			var old_str = jQuery(this).text();
			var new_str = old_str.replace('-', '/');
			jQuery(this).text(new_str)    
		});
		
		jQuery('.job-teaser h2').click(function(){
			jQuery(this).next().slideToggle();
		});
	}	
}


