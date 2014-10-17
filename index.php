<?php
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( '无权限直接访问本文件！' );
}
?>
<?php get_header();?>
<body <?php body_class('index'); ?>>
	<div id="top">
    	<header class="clearfix">
    		<div class="float_left logo"><img class="logo" src="http://www.anzhuo.cn/Public/default/images/logo.png"></div>
    		<div class="float_right header-right">
    			<form method="get" action="/search/index" _lpchecked="1">
					<input type="text" name="keyword" value="">
					<input type="submit" value="">
				</form>
    			<span class=""><a class="reg">注册</a></span>
    			<span class=""><a class="log">注册</a></span>
    		</div>
    	</header>
    	<nav class="navgation">
			<div class="rsp_body">
        		<ul class="menu clearfix">
				<li><a class="cur" href="/">首页</a></li>
				<li><a target="_blank" href="http://bbs.anzhuo.cn/"><span>安卓</span>论坛</a></li>
            	<li><a href="/next">next<span>评测</span></a></li>
				<li><a href="/tuwen">图文<span>评测</span></a></li>
				<li><a href="/video">视频<span>评测</span></a>	</li>	
				<li><a href="/info">新闻<span>资讯</span></a></li>
				<li><a href="/guide">行情<span>导购</span></a></li>
        		</ul>
    		</div>
    	</nav>
    </div> <!-- #header-top	 -->
			<div class="slider"><!-- 幻灯片 -->
				<?php //include(TEMPLATEPATH .'/includes/bw-slider.php');?>
				
			</div>

<div id="container">
		<main id="main">
			<div class="" id="content"><!-- 正文 -->
				<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
					<div class="title">
						<h1><a href="">799元电信4G双卡：荣耀畅玩4电信版体验文</a></h1>
						<div class="title-meta">
							<span class="author">发布者：<a href="">Jeff</a></span>
							<span class="date">2014/10/19</span>
							<span class="view">浏览数：553</span>
							<span class="com">评论（3）</span>
						</div><!-- .title-meta -->
					</div><!-- .title -->
					<div class="featured_image aligncenter">
						<img src="http://img.3gcdn.cn/anzhuo/Uploads/attachment/news/201409/28/5427e70b3a014.jpg">
					</div><!-- .featured_image -->
					<section class="clearfix">
						<div class="entry"><a href="">回想过去，受制于电信网络的特殊性，终端设备价格一直高不可攀。所幸的是，近年来智能手机市场竞争越发激烈，再加上各大国产厂商与中国电信的联合推动，电信手机价格总算是降了下来。9月22日，一直关注电信市场的华为荣耀推出了首款电信4G双卡机型，搭载高通最新64位处理器，售价799元。在此之前，锋潮评测室已经进行了首发开箱图赏，下面接着给大家带来详细的评测文。</a></div><!-- .entry -->
						<div class="btn">
							<a href=""><span class="weibo"></span><p>新浪微博</p></a>
							<a href=""><span class="com"></span><p>我要评论</p></a>
							<a href=""><span class="readmore"></span><p>阅读更多</p></a>
						</div><!-- .btn -->
					</section>
				</article>
			</div> 
		
			<aside>
			
			</aside>
		</main>
	</div><!-- #container -->

<footer>
	
</footer>

<?php get_footer(); ?>