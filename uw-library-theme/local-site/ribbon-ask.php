<?php //only print for Steenbock ?>
<?php if (get_theme_mod('api_site_id') == '29'): ?>
	<a href="#" class="ask-chat-link" data-account="asksteenbocklibrary" data-skin="139"> <?php include_svg("chat"); ?> Chat with Us</a>
<?php endif; ?>

<?php //only print for Chemistry ?>
<?php if (get_theme_mod('api_site_id') == '5'): ?>
	<a href="#" class="ask-chat-link" data-account="askchemistrylibrary" data-skin="141"> <?php include_svg("chat"); ?> Chat with Us</a>	
<?php endif; ?>

<?php //only print for College ?>
<?php if (get_theme_mod('api_site_id') == '6'): ?>
	<a href="#" class="ask-chat-link" data-account="askcollegelibrary" data-skin="140"> <?php include_svg("chat"); ?> Chat with Us</a>
<?php endif; ?>
		