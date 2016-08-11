<div class="teaser-store teaser">
	<?php if(isset($fields['field_store_website']->content)): ?>
		<span class="web"><?php print $fields['field_store_website']->content; ?></span>
	<?php else: ?>
		<span class="web"><h2><?php print $fields['title']->content; ?></h2></span>
	<?php endif; ?>
	<?php print $fields['street']->content; ?>
	<span class="sep">//</span>
	<?php print $fields['city']->content; ?>, 
	<?php print $fields['province']->content; ?>
	<?php print $fields['postal_code']->content; ?>
	<?php if(isset($fields['field_store_phone']->content)): ?>
		<span class="sep">//</span>
		<?php print $fields['field_store_phone']->content; ?>
	<?php endif; ?>
</div>