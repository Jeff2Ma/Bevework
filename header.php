<!DOCTYPE html>
<!--[if lte IE 6]><html class="lteIE_6 lteIE_7 lteIE_8"><![endif]-->
<!--[if lte IE 7]><html class="lteIE_7 lteIE_8"><![endif]-->
<!--[if lte IE 8]><html class="lteIE_8"><![endif]-->
<!--[if gte IE 9]><!-->
<html>
<!--<![endif]-->
<head>
	<title><?php dw_meta_title(); ?></title>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" /> <!--禁止转码 -->
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/css.css" />

<!--[if lte IE 8]>
	<link rel="stylesheet" href="http://www.anzhuo.cn/Public/default/css/productIE.css">
<![endif]-->
<!--[if lte IE 8]>
	<script src="http://www.anzhuo.cn/Public/default/js/ie/html5shiv.js"></script>
	<link href="http://www.anzhuo.cn/Public/default/css/styleIE.css" type="text/css" rel="stylesheet"/>
<![endif]-->
</head>
<?php wp_head(); ?>
<body <?php body_class('index'); ?>>
	<div id="top">
    	<header class="clearfix">
    		<div class="float_left logo"><img class="logo" src="<?php bloginfo('template_url'); ?>/images/logo.png"></div>
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
