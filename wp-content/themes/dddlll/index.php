<?php get_header(); ?>
<div id="wrap" class="width">
	<div>
		<?php while( have_posts() ): the_post(); ?>		
		<div class="loop">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="info">
				<?php the_time( 'Y年m月d日' ); ?><span class="line">|</span><?php the_category(', ') ?><span class="line">|</span><?php comments_popup_link ('0 条评论','1 条评论','% 条评论'); ?> <span class="line">|</span><?php the_tags('标签：', ', ', ''); ?>
			</div>
			<div class="content">
				<?php the_content('Read More'); ?>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<div id="page">
		<div class="prev"><?php previous_posts_link(__( '&lt;')); ?></div>
		<div class="next"><?php next_posts_link(__( '&gt;')); ?></div>
	</div>		
</div>
<?php get_footer(); ?>