<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage SimPo
 * @since SimPo 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="back-to-top"><a><?php esc_attr_e( 'Back to Top', 'simpo' ); ?></a></div>
		<script src="<?php echo get_template_directory_uri(); ?>/js/backtotop.js" type="text/javascript"></script>
		<div class="site-info">
			<?php do_action( 'simpo_credits' ); ?>
			<div class="copyright">
			<p>主题下载 by <a href="http://v7v3.com">wordpress主题</a>
			</br>Theme <a href="http://blog.deartanker.com/?p=1787">SimPo</a> by <a href="http://blog.deartanker.com/">DearTanker</a>
			</br><a href="<?php echo esc_url( home_url( '/' ) ); ?>sitemap.xml"> SiteMap </a>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>sitemap.html"> 站点地图 </a><a href="<?php echo esc_url( home_url( '/' ) ); ?>sitemap_baidu.xml">Baidu SiteMap</a></p>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'simpo' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'simpo' ); ?>"><?php printf( __( 'Proudly powered by %s', 'simpo' ), 'WordPress' ); ?></a>
			<div>
			<div class="themecheck">
			<script type='text/javascript'>
				(function() {
    				var c = document.createElement('script'); 
    				c.type = 'text/javascript';
    				c.async = true;
    				c.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.clicki.cn/boot/49411';
    				var h = document.getElementsByTagName('script')[0];
    				h.parentNode.insertBefore(c, h);
				})();
			</script>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>