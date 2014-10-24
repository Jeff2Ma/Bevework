<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	// If using image radio buttons, define a directory path
	$imagedwpath =  get_template_directory_uri() . '/images/pattern/sample/';
	$imagedwpath2 =  get_template_directory_uri() . '/images/';
	$options = array();


	$options[] = array(
		'name' => __('主题说明', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		//'name' => __('主题相关', 'options_framework_theme'),
		'desc' => __('<div id="message2" class="updated below-h2">
    		<p>感谢您使用Bevework 主题！下面是一些事项说明：
    		</p></div>', 'options_framework_theme'),
		'type' => 'info');

	$options[] = array(
		//'name' => __('主题相关', 'options_framework_theme'),
		'desc' => __('
			<p><a href="">Bevework 主题介绍</a>  <a href="">最新版下载地址</a> <a href="">作者主页</a></p>
			<span>声明：</span>
			<ol>
			<li>Bevework 主题是免费主题，但<strong style="color:red;">不提供</strong>免费技术支持；如果你喜欢，可以加入Bevework 主题用户群，互帮互助；</li>
			<li>如果你是在第三方下载本主题，为了安全请前往官方网站重新下载安装；</li>
			<li>Bevework 主题一旦有更新您将会收到通知，到时候按照说明操作即可；</li>
			<li>Bevework 主题采用GPL 协议，不得用于任何形式的商业行为；</li>
			<li>因为是免费主题，为了保护作者收费主题客户的利益，本主题功能绝对有所保留；如果有需要，欢迎购买作者的收费主题！体验更加强大功能的WordPress 中文主题！</li>
			</ol>
			', 'options_framework_theme'),
		'type' => 'info');

		$options[] = array(
		//'name' => __('推广', 'options_framework_theme'),
		'desc' => __('
			<strong style="color:red;">优秀收费主题推广：</strong>
			<p>以下是作者开发的几款收费主题，如果你喜欢，欢迎购买支持作者！（收费主题均提供免费技术支持）</p>

			'),
		'type' => 'info');

	$options[] = array(
		//'name' => __('end', 'options_framework_theme'),
		'desc' => __('<div id="message2" class="updated below-h2">
    		<p>感谢您阅读本起始页！请点击上面的选项卡切换进行主题设置！Have Fun!
    		</p></div>', 'options_framework_theme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('基础设置', 'options_framework_theme'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('favicon 图标', 'options_framework_theme'),
		'desc' => __('在这里上传你的favicon Logo，推荐大小: 16x16，格式及名称最好为favicon.ico', 'options_framework_theme'),
		'id' => 'dw_minilogo',
		'std'=> get_bloginfo('template_url').'/images/favicon.ico',
		'type' => 'upload');

	$options[] = array(
		'name' => __('网站logo', 'options_framework_theme'),
		'desc' => __('在这里上传你的网站logo，推荐大小: 224x64', 'options_framework_theme'),
		'id' => 'dw_logo',
		'std'=> get_bloginfo('template_url').'/images/logo.png',
		'type' => 'upload');	
	
	// $options[] = array(
	// 	'name' => __('首页关键词', 'options_framework_theme'),
	// 	'desc' => __('首页关键词，用于源代码中显示；一般不超过100个字符，关键词之间用英文逗号隔开', 'options_framework_theme'),
	// 	'id' => 'dw_keywords',
	// 	'std' => 'WordPress,wordpress主题,wordpress插件,WordPress开发,代码,前端,建站',
	// 	'type' => 'textarea');

	// $options[] = array(
	// 	'name' => __('首页描述', 'options_framework_theme'),
	// 	'desc' => __('首页描述，用于源代码中显示；一般不超过200个字符', 'options_framework_theme'),
	// 	'id' => 'dw_description',
	// 	'std' => '一个有关WordPress技巧与前端开发知识的个人博客，以分享、研究探讨WordPress技巧为主要内容，博主乃WordPress极客一枚',
	// 	'type' => 'textarea');

	$options[] = array(
		'name' => __('文章页特色图像', 'options_framework_theme'),
		'desc' => __('是否在文章页中打开特色图像？（默认打开）', 'options_framework_theme'),
		'id' => 'dw_singlefigur',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('首页页脚友情链接', 'options_framework_theme'),
		'desc' => __('开启首页页脚友情链接模块？（默认开启），设置友情链接请通过“仪表盘-链接”设置', 'options_framework_theme'),
		'id' => 'dw_openlink',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('统计代码', 'options_framework_theme'),
		'desc' => __('在此处添加javascript统计代码（如百度统计、Google Analytics），必须包括script的开闭标签', 'options_framework_theme'),
		'id' => 'dw_tongji',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('社交媒体', 'options_framework_theme'),
		'type' => 'heading');

$options[] = array(
		'desc' => '<div id="message2" class="updated below-h2"><p>以下列出常用的社交网络，会显示在页脚处，需要你填入你的账号链接相关，建议勾选4个为佳。</p></div>',
		'type' => 'info');


	$options[] = array(
		'name' => __('RSS', 'options_framework_theme'),
		'desc' => __('启用', 'options_framework_theme'),
		'id' => 'md_rss',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('填入RSS链接', 'options_framework_theme'),
		'id' => 'md_rss_url',
		'std' => '/feed',
		'class' => 'hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('微信（建议勾选）', 'options_framework_theme'),
		'desc' => __('启用', 'options_framework_theme'),
		'id' => 'md_wechat',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('上传微信二维码图片', 'options_framework_theme'),
		'id' => 'md_wechat_img',
		'class' => 'hide',
		'std'=>get_bloginfo('template_url').'/images/wechatimg.png',
		'type' => 'upload');

	$options[] = array(
		'name' => __('QQ', 'options_framework_theme'),
		'desc' => __('启用', 'options_framework_theme'),
		'id' => 'md_qq',
		'std' => '0',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('填入QQ个人消息代码', 'options_framework_theme'),
		'id' => 'md_qq_url',
		'class' => 'hide',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('新浪微博', 'options_framework_theme'),
		'desc' => __('启用', 'options_framework_theme'),
		'id' => 'md_weibo',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('填入微博个人链接', 'options_framework_theme'),
		'id' => 'md_weibo_url',
		'class' => 'hide',
		'std' => 'http://weibo.com/jh2316/',
		'type' => 'text');

	$options[] = array(
		'name' => __('人人', 'options_framework_theme'),
		'desc' => __('启用', 'options_framework_theme'),
		'id' => 'md_renren',
		'std' => '0',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('填入人人网个人链接', 'options_framework_theme'),
		'id' => 'md_renren_url',
		'class' => 'hide',
		'std' => '',
		'type' => 'text');


	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('启用', 'options_framework_theme'),
		'id' => 'md_tt',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('填入推特个人链接', 'options_framework_theme'),
		'id' => 'md_tt_url',
		'class' => 'hide',
		'std' => 'https://twitter.com/Jeff2Ma',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook', 'options_framework_theme'),
		'desc' => __('启用', 'options_framework_theme'),
		'id' => 'md_fb',
		'std' => '0',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('填入Facebook个人链接', 'options_framework_theme'),
		'id' => 'md_fb_url',
		'class' => 'hide',
		'std' => '',
		'type' => 'text');


	$options[] = array(
		'name' => __('Github', 'options_framework_theme'),
		'desc' => __('启用', 'options_framework_theme'),
		'id' => 'md_github',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('填入Github个人链接', 'options_framework_theme'),
		'id' => 'md_github_url',
		'class' => 'hide',
		'std' => 'https://github.com/Jeff2Ma',
		'type' => 'text');

	$options[] = array(
		'name' => __('高级设置', 'options_framework_theme'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('自定义CSS 代码', 'options_framework_theme'),
		'desc' => __('自定义CSS 代码，必须包括CSS 的开闭标签', 'options_framework_theme'),
		'id' => 'dw_customcss',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('自定义js 代码', 'options_framework_theme'),
		'desc' => __('自定义js 代码，必须包括script的开闭标签', 'options_framework_theme'),
		'id' => 'dw_customjs',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('自定义页脚右侧内容1', 'options_framework_theme'),
		'desc' => __('定义页脚内容，请使用html代码', 'options_framework_theme'),
		'id' => 'dw_footertext1',
		'std' => '<ul>
					<li>关于我们</li>
					<li><a href="//devework.com/">作者主页</a></li>
					<li><a href="//devework.com/about">关于作者</a></li>
					<li><a href="//devework.com/contact">联系我们</a></li>
					<li><a href="//devework.com/contact">定制主题</a></li>
				</ul>',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('自定义页脚右侧内容2', 'options_framework_theme'),
		'desc' => __('定义页脚内容，请使用html代码', 'options_framework_theme'),
		'id' => 'dw_footertext2',
		'std' => '<ul>
					<li>更多推荐</li>
					<li><a href="//store.devework.com/">DW商城</a></li>
					<li><a href="//devework.com/theme">收费主题</a></li>
					<li><a href="//my.hengtian.org/aff.php?aff=1307">衡天主机</a></li>
					<li><a href="//portal.qiniu.com/signup?code=3lpd8y6fsplqp">七牛云存储</a></li>
				</ul>',
		'type' => 'textarea');
	
	

	$options[] = array(
		'name' => __('更多主题', 'options_framework_theme'),
		'type' => 'heading');

	// $options[] = array(
	// 	'name' => __('高级功能', 'options_framework_theme'),
	// 	'type' => 'heading');

	return $options;
}