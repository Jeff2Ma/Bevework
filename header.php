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
<meta http-equiv="Cache-Control" content="no-siteapp" /> <!--fuckbaidu-->
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
		<?php wp_nav_menu( 
    		array( 
    		'theme_location' => 'menu-primary',
    		'container_class' => 'rsp_body', 
    		'menu_class' => 'menu clearfix' 
    		//'menu_id' => 'menu-primary-items', 
    		//'fallback_cb' => 'nav_fallback' 
    	) ); ?>
	</nav>




    </div> <!-- #header-top	 -->
			<div class="slider"><!-- 幻灯片 -->
				<?php //include(TEMPLATEPATH .'/includes/bw-slider.php');?>				
			</div>

<div id="container">
		<main id="main">
