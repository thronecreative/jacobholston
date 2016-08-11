<div class="product-full product">
	<?php if(isset($fields['field_product_images']->content)): ?>
		<div class="images">
			<div class="image-main"><?php print $fields['field_product_images']->content; ?></div>
			<?php if(isset($fields['field_product_images_1']->content)): ?>
				<div class="image-other"><?php print $fields['field_product_images_1']->content; ?></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	
	<div class="body">
		
		<h2>
			<?php print $fields['title']->content; ?>
			<?php if(isset($fields['field_product_short_disc']->content)): ?>
				 - <?php print $fields['field_product_short_disc']->content; ?>
			<?php endif; ?>
		</h2>
		<?php if(isset($fields['field_product_display_sku']->content)): ?>
			<div class="sku"><?php print $fields['field_product_display_sku']->content; ?></div>
		<?php endif; ?>
		<div class="price"><?php print $fields['commerce_price']->content; ?></div>
		<?php if(isset($fields['field_product_info']->content)): ?>
			<div class="info"><?php print $fields['field_product_info']->content; ?></div>
		<?php endif; ?>
		<div class="add-to-cart"><?php print $fields['field_product_reference']->content; ?></div>
		<div class="service-links"><?php print $fields['service_links']->content; ?></div>
		
		<?php if(isset($fields['field_product_other']->content)): ?>
			<div class="other-products">
				<h3>You might also like:</h3>
				<?php print $fields['field_product_other']->content; ?>
			</div>
		<?php endif; ?>
	</div>
	
</div>


<script>
	var total_items = 0;
	var current_item = 0;
	var last_item;
	
	jQuery(document).ready(function() {
		
		// Get total items
		total_items = jQuery('.image-main li').length;
		
		jQuery('.image-main li').each(function(index) {
			jQuery(this).attr('id', 'main-' + index).attr('ref', index);
		});
		
		jQuery('.image-other li').each(function(index) {
			jQuery(this).attr('id', 'other-' + index).attr('ref', index);
		});
		
		//Show first image
		jQuery('.image-main li.first').css('display', 'block');
		jQuery('.image-other li.first').css('opacity', .5);
		
		// Select Image
		jQuery('.image-other li').click(function(){
			selectItem(jQuery(this).attr('ref'));
		});
		
		
		
		jQuery('.info li').click(function(){
			jQuery('.field-name-field-product-info-details', this).stop(true, true).slideToggle(500);
		});
		
		jQuery('.info li.first .field-name-field-product-info-details').slideToggle(0);
		
		
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
		fadeItems();
	}
	
	function fadeItems(){
		jQuery('#main-' + current_item).fadeIn(1000);
		jQuery('#main-' + last_item).fadeOut(1000);
		
		jQuery('#other-' + current_item).animate({'opacity': .5}, 1000);
		jQuery('#other-' + last_item).animate({'opacity': 1}, 1000);
	}
	
</script>