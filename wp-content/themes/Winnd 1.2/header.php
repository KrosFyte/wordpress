<!DOCTYPE html>
<html>
<head>
	<title><?php if (is_home()) { ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php } elseif (is_single() || is_page() || is_archive()) { ?><?php wp_title(''); ?> - <?php bloginfo('name'); ?><?php } elseif  (is_404()) { ?><?php _e('未找到页面','min'); ?> - <?php bloginfo('name'); ?><?php } elseif (is_search()) { ?><?php _e('You searched for the following','Winnd'); ?>: "<?php echo wp_specialchars($s); ?>" - <?php bloginfo('name'); ?><?php } ?></title>
	<meta charset="UTF-8" />
	<?php $options = get_option('Winnd_options');?>
	<meta name="keywords" content="<?php echo $options['keywords']; ?>" />
	<meta name="description" content="<?php echo $options['description']; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php bloginfo('name'); ?> <?php _e('RSS Feed','Winnd'); ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php bloginfo('name'); ?> <?php _e('Comments RSS Feed','Winnd'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<?php wp_head(); ?>
</head>
    <body style="background:url(<?php echo $options['bg']; ?>) #fff fixed;">
    <div id="wrapper" >
     <header id="header">
	    <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
	    	<div class="logo"><?php bloginfo('description'); ?></div>
	    </h1>
     </header> 

     <nav id="main-nav">
         <?php wp_nav_menu(array( 'theme_location'=>'primary','container_class' => 'main-nav')); ?>	
     </nav > 

    <!-- header -->