<?php get_header(); ?>
<div id="content">
	<div id="main-content">

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

		<div class="post-single" id="post-<?php the_ID(); ?>">
            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

            <div class="entry-meta">
                <span class="icon-clock"></span><?php the_time(__('Y/j/m','Winnd')) ?>
                <?php if(get_the_tags()): ?><span class="icon-tag"></span><?php the_tags('','&nbsp;,&nbsp;',''); ?><?php endif; ?>
                <span class="icon-bubble"></span><a href="<?php the_permalink() ?>#comments" title="title"><?php comments_number(__('没有评论','Winnd'), __('1条评论','Winnd'), __('%条评论','Winnd'));?></a></span>
            </div>

			<div class="entry">
				<?php the_content(__('Read the rest of this post','Winnd').' &raquo;'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Winnd').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>

            <div class="last">
		        <nav class="nav">
                    <?php if (get_previous_post()) { previous_post_link('%link'); } else {echo "";}; ?>
                    <?php if (get_next_post()) { next_post_link('%link'); } else {echo "";}; ?>
			    </nav>
                <div class="view"><?php if(function_exists('the_views')) the_views();?></div>

<div class="like"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></div>
			</div>

        <!--以下待修改-->
        
		<?php comments_template(); ?>
		<?php endwhile; else: ?>
			<p class="string"><?php _e('未找到页面','Winnd'); ?></p>
	    <?php endif; ?>
	</div>
</div>
<!-- content-->
<?php get_footer(); ?>