<?php
//后台加载相关菜单项
function dw_store_list_page(){
  add_menu_page("DW商城","DW商城",'manage_options','dw_store_list_page','dwstore_list_xml','dashicons-cart'); 
}
add_action('admin_menu','dw_store_list_page');

define( 'store_list_cache_time', 864000); //10 day

function get_dw_store_list($interval) {
	$store_list_file_url = 'http://store.devework.com/xml/store.xml';
	$db_list_cache_field = 'store_list_cache';
	$db_list_cache_field_last_updated = 'store_list_cache_last_updated';
	$last = get_option( $db_list_cache_field_last_updated );
	$now = time();
	if ( !$last || (( $now - $last ) > $interval) ) {
		if( function_exists('curl_init') ) {
			$ch = curl_init($store_list_file_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$cache = curl_exec($ch);
			curl_close($ch);
		} else {
			$cache = file_get_contents($store_list_file_url); 
		}
		
		if ($cache) {			
			update_option( $db_list_cache_field, $cache );
			update_option( $db_list_cache_field_last_updated, time() );
		} 
		$store_list_data = get_option( $db_list_cache_field );
	}
	else {
		$store_list_data = get_option( $db_list_cache_field );
	}
	
	if( strpos((string)$store_list_data, '<product-list>') === false ) {
		$store_list_data = '<?xml version="1.0" encoding="utf-8"?><product-list><item><name>轻博客主题：Mindia</name><pic>http://storecdn.devework.com/wp-content/uploads/2014/09/mindia.png</pic><price>129</price><link>http://devework.com/theme/mindia/</link><buy>http://store.devework.com/product/mindia</buy><intro>一款Medium 风格的WordPress 主题，类似于轻博客，自媒体博客。主题提倡“以文为本，图片为辅”的写作方式。如果你需要一款主题能让你专注于写作，那么Mindia 主题就是你的不二之选！</intro></item><item><name>移动主题：EaseMobile</name><pic>http://storecdn.devework.com/wp-content/uploads/2014/09/easemobile-326x300.png</pic><price>99</price><link>http://devework.com/theme/easemobile/</link><buy>http://store.devework.com/product/easemobile</buy><intro>一款WordPress 移动（手机）主题，基于Html5+CSS3开发，采用类Android Design +扁平化风格，配以Off Canvas 侧边栏导航，自带主题后台选项，另有相关文章、广告管理，社会化分享、WebApp等实用功能；更考虑了当前国内移动互联网发展情况，将主题性能高度优化。</intro></item><item><name>移动主题：DeveMobile</name><pic>http://storecdn.devework.com/wp-content/uploads/2014/09/devemobile-326x300.png</pic><price>109</price><link>http://devework.com/theme/devemobile/</link><buy>http://store.devework.com/product/devemobile</buy><intro>一款WordPress 移动（手机）主题，基于Html5+CSS3开发，采用类Android Design +扁平化风格，配以Off Canvas 侧边栏导航，自带主题后台选项，另有相关文章、广告管理，社会化分享、WebApp等实用功能；更考虑了当前国内移动互联网发展情况，将主题性能高度优化。</intro></item><item><name>博客主题：Devework</name><pic>http://storecdn.devework.com/wp-content/uploads/2014/09/devework.png</pic><price>99</price><link>http://devework.com/theme/devework/</link><buy>http://store.devework.com/product/devework</buy><intro>基于Html5+CSS3开发，兼容IE7+ 及其他主流浏览器，主题无缝、深度集成移动版本（手机版），拥有强大的后台主题设置页面，提供7+ 小工具以及页面模板，集成SEO、Ajax 评论、公告栏、短代码、社会化分享、相关文章、广告等20多项实用功能。一款用心打造的主题！</intro></item></product-list>';
	}
	$xml = simplexml_load_string($store_list_data); 
	return $xml;
}

function dwstore_list_xml(){
 	$xml = get_dw_store_list(store_list_cache_time);
 ?>
 
 <div class="wrap">
		<h2 class="dashicons-before dashicons-cart"> DW商城 - 商品展示</h2>
		<p>DW商城是DeveWork.com 的Jeff 开通的一个用于销售个人开发的WordPress 商品（包括但不仅限于WordPress主题、WordPress插件）及其他数字商品，所有商品均为个人开发者创造的正版数字产品，提供一站式的自动化在线销售、支付、下载、授权系统，客户可轻松快捷获取所需商品。</p>
		<p><a target="_blank" href="//store.devework.com/">进入商城浏览</a>&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="//store.devework.com/guide">购买流程</a></p>
		<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th style="width:164px;" colspan="2">商品</th>
					<th>简介</th>
					<th style="width:64px;">详细介绍</th>
					<th style="width:64px;text-align:center;">价格</th>
					<th style="width:64px;text-align:center;">购买</th>
				</th>
			</thead>
			<tbody>


 <?php foreach( $xml->item as $item ){ ?>
			<tr>
					<td><img src="<?php echo $item->pic; ?>?imageView/1/w/150/h/150" width="50" /></td>
					<td style="width:100px;"><a href="<?php echo $item->link; ?>"><?php echo $item->name; ?></a></td>
					<td><?php echo $item->intro; ?></td>
					<td><a href="<?php echo $item->link; ?>">查看详细</a></td>
					<td style="text-align:center;"><?php echo $item->price; ?></td>
					<td><a href="<?php echo $item->buy; ?>">立即购买</a></td>
				</th>
			<tr>
<?php } ?>
</tbody>
		</table>
	</div>
<?php }?>