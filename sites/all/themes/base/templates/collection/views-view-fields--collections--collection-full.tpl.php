	<div class="c-gallery">
	<div class="images">
		<?php print $fields['field_collection_images']->content; ?>
	</div>
	<div class="thumbs">
		<?php print $fields['field_collection_images_1']->content; ?>
	</div>
	
	<a href="javascript:nextItem();" id="c-nav-next"></a>
	<a href="javascript:lastItem();" id="c-nav-last"></a>
</div>


<script>
	var total_items = 0;
	var current_item = 0;
	var last_item;
	var sshow;
	
	jQuery(document).ready(function() {
		
		// Get total items
		total_items = jQuery('.images > .item-list > ul > li').length;
		
		
		
		
		//Add index to items + create gallery nav
		jQuery('.images > .item-list > ul > li').each(function(index) {
			jQuery(this).addClass('image-'+index);
		});
		
		jQuery('.thumbs li').each(function(index) {
			jQuery(this).addClass('thumb-'+index);
			jQuery(this).attr('rel', index);
		});
		
		// Add click event
		jQuery('.images li img').click(function(){
				nextItem();
				//clearInterval(sshow);
			}
		);
		
		// Add click event
		jQuery('.thumbs li').click(function(){
				selectItem(jQuery(this).attr('rel'));
				clearInterval(sshow);
			}
		);
		
		//Start Show
		//sshow = setInterval('nextItem()', 5000);
		
		jQuery('.field-name-field-image-product-reference a').each(function(index) {
			//jQuery(this).append('<span>shop</span>');
		});
		
		
	});
	
	
	
	
	function nextItem(){
		last_item = current_item;
		current_item++;
		if(current_item == total_items){
			current_item = 0;
		}
		fadeItems();
	}
	
	function lastItem(){
		last_item = current_item;
		current_item--;
		if(current_item == -1){
			current_item = total_items - 1;
		}
		fadeItems();
	}
	
	function selectItem(index){
		last_item = current_item;
		current_item = index;
		//clearInterval(sshow);
		fadeItems();
	}
	
	function fadeItems(){
		jQuery('.c-gallery .image-'+last_item).fadeOut(500);
		jQuery('.c-gallery .image-'+current_item).fadeIn(500);
		
		
		jQuery('.c-gallery .thumb-'+last_item).animate({opacity: 1}, 500);
		jQuery('.c-gallery .thumb-'+current_item).animate({opacity: .5}, 500);
	}
	
</script>