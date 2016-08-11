<div class="teaser-post teaser">
	<div class="main clearfix">
		<?php if(isset($fields['field_post_cover_image']->content)): ?>
			<div class="image"><?php print $fields['field_post_cover_image']->content; ?></div>
		<?php endif; ?>
		
		
		
		<h2><?php print $fields['title']->content; ?></h2>
		<div class="date"><?php print $fields['created']->content; ?></div>
		<div class="body">
			<?php if(isset($fields['field_news_video']->content)): ?>
				<div class="video"><?php print $fields['field_news_video']->content; ?></div>
			<?php endif; ?>
			
			<?php if(isset($fields['body']->content)): ?>
				<?php print $fields['body']->content; ?>
			<?php endif; ?>
			
		</div>
	</div>
	
	<?php if(isset($fields['field_post_original_article']->content)): ?>
		<div class="article-link"><?php print $fields['field_post_original_article']->content; ?></div>
	<?php endif; ?>
</div>
