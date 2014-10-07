<?php
/*Template Name:邻居*/
?>
<?php get_header(); ?>
<div id="content">
	<div id="main-content">

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

	<div class="page" id="page-<?php the_ID(); ?>">
            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

        <div class="entry">
        	<ul class="links">
        	<?php
        	$bookmarks = get_bookmarks('categorize=1');
        	//如果你要输出某个链接分类的链接，更改一下get_bookmarks参数即可
        	if ( !empty($bookmarks) ) {
        	foreach ($bookmarks as $bookmark) {
        	echo '<li><a href="' , $bookmark->link_url , '" title="' , $bookmark->link_description , '" target="_blank" >' , $bookmark->link_name , '</a><span>' , $bookmark->link_description, '</span></li>';
        	}
        	}
        	?>
        	</ul>
        </div>
	</div>

        <!--以下待修改-->
        
		<?php comments_template(); ?>
		<?php endwhile; else: ?>
			<p class="string"><?php _e('未找到页面','Winnd'); ?></p>
	    <?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>