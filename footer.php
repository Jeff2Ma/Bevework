<div class="clearfix"></div>

	<div id="links">
		<div class="wrap">
			<ul class="clearfix">
				<?php wp_list_bookmarks('title_li=&depth=1&show_images=0&categorize=0&class=clearfix'); ?>
			</ul>
		</div><!-- .wrap -->
	</div><!-- #links -->

<footer id="footer">
	<div class="f-content">
		<div class="float_left">
			<div class="social">
				<a href="" class="weibo"><i class="icon-weibo"></i><span>新浪微博</span></a>
				<a href="" class="qq"><i class="icon-qq"></i><span>QQ</span></a>
				<a href="" class="twitter"><i class="icon-twitter"></i><span>Twitter</span></a>
				<a href="" class="github"><i class="icon-github"></i><span>Github</span></a>
			</div>
			<p class="subtitle center"><?php bloginfo('description'); ?></p>
		</div><!-- .float_left -->
		<div class="float_right">
			<div class="weixin"><img src="<?php bloginfo('template_url'); ?>/images/wechatimg.png" alt=""><span>微信</span></div>
			<div class="about">
				<ul>
					<li>关于我们</li>
					<li><a href="//devework.com/">作者主页</a></li>
					<li><a href="//devework.com/about">关于作者</a></li>
					<li><a href="//devework.com/contact">联系我们</a></li>
					<li><a href="//devework.com/contact">定制主题</a></li>
				</ul>
				<ul>
					<li>更多推荐</li>
					<li><a href="//store.devework.com/">DW商城</a></li>
					<li><a href="//devework.com/theme">收费主题</a></li>
					<li><a href="//my.hengtian.org/aff.php?aff=1307">衡天主机</a></li>
					<li><a href="//portal.qiniu.com/signup?code=3lpd8y6fsplqp">七牛云存储</a></li>
				</ul>
			</div>
			<div class="cpright"></div>
		</div> <!-- .float_right -->
	</div> <!-- .f-content -->


	<p class="clearfix footercpright">&copy; <?php echo date("Y")?>  <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>.  Powered by <a target="_blank" rel="nofollow" href="//cn.wordpress.org">WordPress</a>. Designed from <a  target="_blank" rel="nofollow" href="//anzhuo.cn/" title="安卓网">anzhuo</a>. Theme by <a target="_blank" rel="nofollow" href="//devework.com/" title="DeveWork.com荣誉出品">Bevework</a>.</p>
	
</footer>


<?php wp_footer(); ?> 

</body>
</html>
