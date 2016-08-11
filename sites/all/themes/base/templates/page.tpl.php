
<div id="header-container">
	<div id="header">
		<div id="logo"><a href="/">Jacob Holston123</a></div>
		<div class="menu-toggle icon-list"></div>
		<div id="main-nav">
			

			<div id="menu">
				<?php print render($page['nav_main']); ?>
				
			</div>
		</div> 
	</div>
</div>
<?php if(isset($messages)): ?>
			<div id="messages"><?php echo $messages; ?></div>
		<?php endif; ?>

<div id="main-container">
	<div class="main">
		<?php if(isset($title)): ?>
			<h1 id="page-title"><?php echo $title; ?></h1>
		<?php endif; ?>

		<?php if(isset($tabs)): ?>
			<div id="tabs"><?php echo render($tabs); ?></div>
		<?php endif; ?>

		<div id="content">
			<?php if(drupal_is_front_page()): ?>	
				<div id="tagline"><img src="<?php echo path_to_theme(); ?>/images/JH-California-Design-Premium.svg" alt=""></div>
				<div id="shop-now"><a href="/shop">Shop Now</a></div>
			<?php endif; ?>

			<?php if($node_type == 'collection'): ?>
				
			

				<div id="line-sheet">
					<?php if (isset($_POST['password']) && ($_POST['password'] == $line_sheet_pw)): ?>
						<meta content="2; URL=/sites/default/files/line-sheets/<?php print $line_sheet_url; ?>" http-equiv="Refresh" />
						Downloading…
					<?php else: ?>
						<a id="line-sheet-btn" href="#">Download Line Sheet</a>
					<?php endif; ?>	
				</div>
							
				<?php if (!isset($_POST['password']) || ($_POST['password'] != $line_sheet_pw)): ?>
					<div id="line-sheet-form"> 
						<form method="post">
							<input name="password" type="password" placeholder="password"/>
							<input class="form-submit"  type="submit" value="download" />
						</form>
					</div>
				<?php endif; ?>	
			<?php endif; ?>

			<?php print render($page['content']); ?>
		</div>
	</div>

	<div class="insta-footer">
		<h3>Instagram: <a href="http://instagram.com/jacobholston">@jacobholston</a></h3>
		<div id="footer-instafeed"></div>
	</div>
	
</div>

<div class="copy">
	&copy; <?php echo date('Y') . ' ' . $site_name; ?>

	<div class="social-icons">
		<a href="http://twitter.com/jacobholston" class="icon-twitter" target="_blank"></a>
		<a href="http://instagram.com/jacobholston" class="icon-instagram" target="_blank"></a>
		<a href="http://pinterest.com/jacobholston" class="icon-pinterest" target="_blank"></a>
	</div>
</div>


<div id="back-to-top"><div><span class="icon-arrow-up"></span></div></div>



