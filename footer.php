<?php if ( ! defined( 'ABSPATH' ) ) exit;
$md_rss_url = beve_option('md_rss_url');
$md_wechat_img = beve_option('md_wechat_img');
$md_weibo_url = beve_option('md_weibo_url');
$md_qq_url = beve_option('md_qq_url');
$md_renren_url = beve_option('md_renren_url');
$md_tt_url = beve_option('md_tt_url');
$md_fb_url = beve_option('md_fb_url');
$md_github_url = beve_option('md_github_url');
?>
<div class="clearfix"></div>

<?php if( is_home()&&(beve_option('dw_openlink')) ){?>
	<div id="links">
		<div class="wrap">
			<ul class="clearfix">
				<?php wp_list_bookmarks('title_li=&depth=1&show_images=0&categorize=0&class=clearfix'); ?>
			</ul>
		</div><!-- .wrap -->
	</div><!-- #links -->
<?php } ?>

<footer id="footer">
	<div class="f-content">
		<div class="float_left">
			<div class="social">
				<?php if ( beve_option('md_rss') ){?><a rel="nofollow" href="<?php echo $md_rss_url ?>" title="RSS" class="rss"><i class="icon-rss"></i><span>RSS</span></a><?php }?>
				<?php if( beve_option('md_qq') ){?> <a rel="nofollow" href="<?php echo $md_qq_url; ?>" title="腾讯QQ" class="qq"><i class="icon-qq"></i><span>腾讯QQ</span></a><?php }?>
                <?php if( beve_option('md_weibo') ){?> <a rel="nofollow" href="<?php echo $md_weibo_url; ?>" title="新浪微博" class="weibo"><i class="icon-weibo "></i><span>新浪微博</span></a><?php }?>
                <?php if( beve_option('md_renren') ){?> <a rel="nofollow" href="<?php echo $md_renren_url; ?>" title="人人网" class="renren"><i class="icon-renren"></i><span>人人</span></a><?php }?>
                <?php if( beve_option('md_tt') ){?> <a rel="nofollow" href="<?php echo $md_tt_url; ?>" title="Twitter" class="twitter"><i class="icon-twitter"></i><span>Twitter</span></a><?php }?>
                <?php if( beve_option('md_fb') ){?> <a rel="nofollow" href="<?php echo $md_fb_url; ?>" title="Facebook" class="facebook"><i class="icon-facebook"></i><span>Facebook</span></a><?php }?>
                <?php if( beve_option('md_github') ){?> <a rel="nofollow" href="<?php echo $md_github_url; ?>" title="Github" class="github"><i class="icon-github"></i><span>Github</span></a><?php }?>
			</div>
			<p class="subtitle center"><?php bloginfo('description'); ?></p>
		</div><!-- .float_left -->
		<div class="float_right">
			<?php if ( beve_option('md_wechat') ){?><div class="weixin"><img src="<?php echo $md_wechat_img; ?>" alt="微信"><span>微信</span></div><?php }?>
			<div class="about">
				<?php echo beve_option('dw_footertext1'); ?>
				<?php echo beve_option('dw_footertext2'); ?>
			</div>
			<div class="cpright"></div>
		</div> <!-- .float_right -->
	</div> <!-- .f-content -->
<div class="back-top">
	<a href="#" id="goTop">回到顶部</a>
</div>
<?php dw_footer(); ?>
</body>
</html>
