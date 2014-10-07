<?php get_header(); ?>
<div id="home-head">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="text-center">
					<img src="<?php echo get_option('mao10_homeimg'); ?>" class="img-circle">
					<h1><?php bloginfo('name'); ?></h1>
					<p class="lead"><?php bloginfo('description'); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="panel panel-default post-list">
				<div class="panel-heading">
					<h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="panel-body">
					<?php the_excerpt(); ?>
				</div>
				<div class="panel-heading">
					<ul class="list-inline">
						<?php the_tags('<li><i class="glyphicon glyphicon-tags"></i>标签：',',','</li>'); ?>
						<li><i class="glyphicon glyphicon-eye-open"></i>浏览：<?php echo getPostViews(get_the_ID()); ?></li>
						<li><i class="glyphicon glyphicon-comment"></i>评论：<?php comments_number('0', '1', '%' );?></li>
					</ul>
				</div>
				<div class="panel-footer">
					<div class="text-center">
						<button type="button" class="btn btn-danger btn-readmore" data-toggle="modal" data-target="#myModal" data-src="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<i class="glyphicon glyphicon-plus-sign"></i> 快速阅读
						</button>
					</div>
				</div>
			</div>
			<?php endwhile; endif; ?>
			<ul id="pager" class="pagination">
				<?php par_pagenavi(9); ?>
			</ul>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h2 class="modal-title" id="myModalLabel">
					<a href="#">Modal title</a>
				</h2>
			</div>
			<div id="loading">
				<div class="progress">
					<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
						<span class="sr-only">
							100% Complete (success)
						</span>
					</div>
				</div>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">
					关闭
				</button>
				<a href="#" class="btn btn-danger" id="myModalBtn">
					发表评论
				</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php get_footer(); ?>