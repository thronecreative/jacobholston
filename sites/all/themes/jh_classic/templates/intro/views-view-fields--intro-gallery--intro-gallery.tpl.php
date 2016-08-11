<?php //dpm($fields); ?>

<div class="intro-gallery">
	<?php if(isset($fields['field_intro_images']->content)): ?>
		<div class="images"><?php print $fields['field_intro_images']->content; ?></div>
	<?php endif; ?>
	<?php if(isset($fields['field_intro_collection']->content)): ?>
		<div class="c-link"><?php print $fields['field_intro_collection']->content; ?></div>
	<?php endif; ?>
	<div class="gallery-nav"></div>
</div>


<script>
	var total_items = 0;
	var current_item = 0;
	var last_item;
	var sshow;
	
	jQuery(document).ready(function() {
		
		// Get total items
		total_items = jQuery('.images li').length;
		
		
		// Add click event
		jQuery('.images li').click(function(){
				nextItem();
				clearInterval(sshow);
			}
		);
		
		//Add index to items + create gallery nav
		jQuery('.images li').each(function(index) {
			jQuery(this).addClass('image-'+index);
			
			jQuery('.gallery-nav').append('<a class="item-'+index+'" href="javascript:selectItem('+index+');">&bull;</a>');
		});
		
		//Start Show
		sshow = setInterval('nextItem()', 5000);
		
	});
	
	
	
	
	function nextItem(){
		last_item = current_item;
		current_item++;
		if(current_item == total_items){
			current_item = 0;
		}
		fadeItems();
	}
	
	function selectItem(index){
		last_item = current_item;
		current_item = index;
		clearInterval(sshow);
		fadeItems();
	}
	
	function fadeItems(){
		jQuery('.intro-gallery .image-'+last_item).fadeOut(1000);
		jQuery('.intro-gallery .image-'+current_item).fadeIn(1000);
		
		jQuery('.intro-gallery .item-'+current_item).animate({opacity: 1}, 1000);
		jQuery('.intro-gallery .item-'+last_item).animate({opacity: .5}, 1000);
	}
	
</script>