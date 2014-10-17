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

				
			</div>

<div id="container">
		<main id="main">
			<div class="" id="content"><!-- 正文 -->
				<article>
					
				</article>
			</div> 
		
			<aside>
			
			</aside>
		</main>
	</div><!-- #container -->

<footer>
	
</footer>

<?php get_footer(); ?>