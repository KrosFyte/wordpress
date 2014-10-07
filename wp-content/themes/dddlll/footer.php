<div id="footer">
	<div id="bottomnav">
		<div class="list links">
			<h3>友情链接</h3>
			<ul><?php wp_list_bookmarks('title_li=&categorize=0&limit=40'); ?></ul>
		</div>
		<div class="list article">
			<h3>随机文章</h3>
			<ul><?php query_posts(array('orderby' => 'rand', 'showposts' => 5, 'caller_get_posts' => 5));
			if (have_posts()) :
			while (have_posts()) : the_post();?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile;endif; ?><?php wp_reset_query();?>
			</ul>
		</div>
		<div class="list tags">
			<h3>热门标签</h3>
			<?php wp_tag_cloud('number=15&orderby=count&order=RAND&smallest=10px&largest=10px');?>
		</div>
	</div>
	<div id="bottom">
		<div id="copyright">
			Copyright © 2012 - 2014 | Powered by <a href="http://wordpress.org/" target="_blank" rel="nofollow">WordPress</a> | Theme by <a href="http://www.2zzt.com" target="_blank" title="wordpress主题">wordpress主题</a>
		</div>
		<div style="right:50%;margin-right:-420px;display: none;" id="totop">▲</div>
	</div>
</div>
<script type='text/javascript'>
    backTop=function (btnId){
        var btn=document.getElementById(btnId);
        var d=document.documentElement;
        var b=document.body;
        window.onscroll=set;
        btn.onclick=function (){
            btn.style.display="none";
            window.onscroll=null;
            this.timer=setInterval(function(){
                d.scrollTop-=Math.ceil((d.scrollTop+b.scrollTop)*0.1);
                b.scrollTop-=Math.ceil((d.scrollTop+b.scrollTop)*0.1);
                if((d.scrollTop+b.scrollTop)==0) clearInterval(btn.timer,window.onscroll=set);
            },10);
        };
        function set(){btn.style.display=(d.scrollTop+b.scrollTop>300)?'block':"none"}
    };
    backTop('totop');
</script>
<?php wp_footer(); ?>
</body></html>