<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' );?>" />
<title><?php if ( is_tag() ) {
echo wp_title('Tag:');if($paged > 1) printf(' - 第%s页',$paged);echo ' | '; bloginfo( 'name' );
} elseif ( is_archive() ) {
echo wp_title('');  if($paged > 1) printf(' - 第%s页',$paged);    echo ' | ';    bloginfo( 'name' );
} elseif ( is_search() ) {
echo '&quot;'.wp_specialchars($s).'&quot;的搜索结果 | '; bloginfo( 'name' );
} elseif ( is_home() ) {
bloginfo( 'name' );echo ' | ';bloginfo('description');$paged = get_query_var('paged'); if($paged > 1) printf(' - 第%s页',$paged);
}  elseif ( is_404() ) {
echo '页面不存在！ | '; bloginfo( 'name' );
} else {
echo wp_title( ' | ', false, right )  ; bloginfo( 'name' );
} ?></title>
<?php
if(is_single()) {
if($post->post_excerpt) {
$description = $post->post_excerpt;
} else {
$description = mb_strimwidth(strip_tags($post->post_content), 0, 220);
}
$keywords = "";
$tags = wp_get_post_tags($post->ID);
foreach($tags as $tag) {
$keywords = $keywords . $tag->name . ", ";
}
} else {
if($options['description']) {
$description = $options['description'];
} else {
$description = get_bloginfo('description');
}
$keywords = "自行填写";
}
?>
<meta name="description" content="<?php echo $description?>" />
<meta name="keywords" content="<?php echo $keywords?>" />
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" rel="stylesheet" />
<?php wp_head();?>
</head>
<body>
<div id="header">
	<div class="width">
		<?php if(function_exists('wp_nav_menu')) {wp_nav_menu(array('theme_location'=>'main','menu_id'=>'nav','container'=>'ul'));}?>
		<script type="text/javascript"> jQuery(document).ready(function($) {$('#nav li').hover(function() {$('ul', this).slideDown(300)},function() {$('ul', this).slideUp(300)});});</script><!--二级导航js-->
		<h1 class="right"><?php bloginfo('name'); ?></h1>
		<div id="triangle" class="right"></div>
		<form id="search" class="right" method="post" action="<?php echo get_option('home'); ?>">
			<input type="text" name="s" value="Search..." onfocus="if (value ==&#39;Search...&#39;){value =&#39;&#39;}" onblur="if (value ==&#39;&#39;){value=&#39;Search...&#39;}" autocomplete="off">
		</form>
	</div>
</div>