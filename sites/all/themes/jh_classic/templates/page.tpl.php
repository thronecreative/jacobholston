

<div id="container" class="clearfix">

	
		<div id="header-top" class="clearfix">
			<?php print render($page['header_top']); ?>
			<span class="float-right">Free Shipping (in the US) on any order.</span>
			<?php if($logged_in): ?>
				<div id="admin-menu">
					<a href="/user/<?php print $user->uid; ?>/edit">Edit Account</a> / 
					<a href="/user/<?php print $user->uid; ?>/orders">My Orders</a> / 
					<a href="/user/logout">Logout</a>
				</div>
			<?php else: ?>
				<div id="admin-menu">
					<a href="/user/login">Log in</a>
				</div>
			<?php endif; ?>
			
			
			
			
		</div>
		
		
		<div id="header-main">
				<div id="logo"><a href="/">Jacob Holston</a></div>
				
				<?php print render($page['header']); ?>
	
		</div>
		
		<?php if ($messages): ?>
			<div id="messages">
				<?php print $messages; ?>
			</div>
		<?php endif; ?>
		
			
		<?php if ($tabs): ?>
			<div class="tabs">
				<?php print render($tabs); ?>
			</div>
		<?php endif; ?>
		
		<?php if ($title): ?>
			<div id="title-main" class="clearfix">
				<h1><?php print $title; ?></h1>
				
				
				<?php if($node_type == 'collection'): ?>				
				
				<div id="line-sheet">
					<?php if (isset($_POST['password']) && ($_POST['password'] == $line_sheet_pw)): ?>
						<meta content="2; URL=/sites/default/files/line-sheets/<?php print $line_sheet_url; ?>" http-equiv="Refresh" />
						Downloading…
					<?php else: ?>
						<a id="line-sheet-btn" href="#">Download Line Sheet</a>
					<?php endif; ?>	
				</div>
			<?php endif; ?>
				
			</div>
			
			<?php if($node_type == 'collection'): ?>				
				<?php if (!isset($_POST['password']) || ($_POST['password'] != $line_sheet_pw)): ?>
					<div id="line-sheet-form"> 
						<form method="post">
							<input name="password" type="password" />
							<input class="form-submit"  type="submit" value="download" />
						</form>
					</div>
				<?php endif; ?>	
			<?php endif; ?>
			
			
		<?php endif; ?>
		
		
	  
		<div id="main-content">
			<?php print render($page['content']); ?>
		</div>
		
		
		<div class="push"></div>	
	
</div>

	<div id="footer" class="clearfix">
		<div id="footer-main" class="clearfix">
			<?php if($page['footer_left']): ?>
			<div id="footer-left" class="clearfix">
				<?php print render($page['footer_left']); ?>
			</div>
			<?php endif; ?>
			<?php if($page['footer_middle']): ?>
			<div id="footer-middle" class="clearfix">
				<?php print render($page['footer_middle']); ?>
			</div>
			<?php endif; ?>
			<?php if($page['footer_right']): ?>
			<div id="footer-right" class="clearfix">
				<?php print render($page['footer_right']); ?>
			</div>
			<?php endif; ?>
		</div>
		<div id="footer-bottom" class="clearfix">
			&copy; 2012 Jacob Holston. <?php print render($page['footer_bottom']); ?>
		</div>
	</div>





