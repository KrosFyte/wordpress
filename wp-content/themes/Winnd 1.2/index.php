<?php get_header(); ?>
<?php $options = get_option('Winnd_options');?>

<?php 
	if ( $options['notice'] ){
		 echo '<div id="notice">';
		 echo $options['notice'] ;
		 echo '</div>';
		}
?><!--notice-->

	<div id="content">
		<div id="main-content">

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

            <div class="entry-meta">
                <span class="icon-clock"></span><?php the_time(__('Y/m/j','Winnd')) ?>
                <?php if(get_the_tags()): ?><span class="icon-tag"></span><?php the_tags('','&nbsp;,&nbsp;',''); ?><?php endif; ?>
                <span class="icon-bubble"></span><a href="<?php the_permalink() ?>#comments" title="title"><?php comments_number(__('没有评论','Winnd'), __('1条评论','Winnd'), __('%条评论','Winnd'));?></a></span>
            </div>

            <div class="clearfix"></div>
            <div class="entry">
            <?php the_content(__('继续阅读 >','Winnd')); ?>
            </div>
        </div><!-- post -->

        <!--以下待修改-->

		<?php endwhile; ?>
			<div class="pagination clearfix">
				<span class="prev"><?php next_posts_link('&laquo; '.__('下一页','Winnd')) ?></span>
				<span class="next"><?php previous_posts_link(__('上一页','Winnd').' &raquo;') ?></span>
			</div>
		<?php else : ?>
			<p class="string"><?php _e('You broke the interwebs... wow... way to go.. no really you may want to call someone to take a look at it..','Winnd'); ?></p>
			<a href="<?php echo get_option('home'); ?>/" class="back"><?php _e('Back home','Winnd'); ?></a>
        <?php endif; ?>
	</div><!-- content -->
<?php get_footer(); ?>