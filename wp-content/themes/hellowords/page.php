<?php get_header(); ?>
<div id="breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<ol class="breadcrumb">
					<li>
						当前位置：
						<a href="<?php bloginfo('url'); ?>">
							首页
						</a>
					</li>
					<li class="active">
						<?php the_title(); ?>
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php setPostViews(get_the_ID()); ?>
				<div class="col-md-12" id="single">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading" id="single-title">
							<h1 class="panel-title"><?php the_title(); ?></h1>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<div id="entry">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="panel-heading">
							<ul class="list-inline">
								<?php the_tags('<li><i class="glyphicon glyphicon-tags"></i>标签：',',','</li>'); ?>
								<li><i class="glyphicon glyphicon-eye-open"></i>浏览：<?php echo getPostViews(get_the_ID()); ?></li>
								<li><i class="glyphicon glyphicon-comment"></i>评论：<?php comments_number('0', '1', '%' );?></li>
							</ul>
						</div>
					</div>
					<div class="panel panel-default" id="comment-title">
						<div class="panel-heading">
							<h4 class="panel-title">发表新的回复</h4>
						</div>
						<div class="panel-body">
							<div id="comment">
								<?php comments_template(); ?>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<?php get_template_part('fixedbar'); ?>
	</div>
</div>
<?php get_footer(); ?>