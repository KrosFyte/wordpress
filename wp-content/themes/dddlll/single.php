<?php get_header();?>
<div id="wrap" class="width">
	<?php while( have_posts() ): the_post(); $p_id = get_the_ID(); ?>
	<div id="article">
		<h2><?php the_title(); ?></h2>
		<?php if ( is_page() ) { ?>
		<div class="info">最后编辑@<?php the_time( get_option('date_format').get_option('time_format') ); ?></div>
		<?php } ?>
		<?php if ( is_single() ) { ?>
		<div class="info">
			<?php the_time( 'Y年m月d日' ); ?><span class="line">|</span><?php the_category(', ') ?><span class="line">|</span><?php comments_popup_link ('0 条评论','1 条评论','% 条评论'); ?> <span class="line">|</span><?php the_tags('标签：', ', ', ''); ?>
		</div>
		<?php } ?>
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>
	<?php endwhile; ?>
	<div id="comments">
	<div class="title">评论</div>
	<div class="info">
		<span class="ds-thread-count"><?php comments_popup_link( '还没有留言',' 只有1条留言', '共有% 条留言','comment_num'); ?></span>
	</div>
	<?php comments_template(); ?>
	</div>
</div>
<?php get_footer(); ?>