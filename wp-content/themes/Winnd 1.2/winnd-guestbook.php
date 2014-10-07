<?php
/*Template Name:留言*/
?>
<?php get_header(); ?>
<div id="content">
	<div id="main-content">

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

		<div class="page" id="page-<?php the_ID(); ?>">
            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <?php mostactive(15,365);?>
		</div>
        <!--以下待修改-->
        
		<?php comments_template(); ?>
		<?php endwhile; else: ?>
			<p class="string"><?php _e('未找到页面','Winnd'); ?></p>
	    <?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>