<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
* 
* WordPress 免费博客主题 Bevework，请勿用于商业行为，谢谢！
* 本主题设计借鉴了http://www.anzhuo.cn/，特此感谢！
* 二次开发建议：建议个人添加代码从custom 文件夹下custom.php 添加。若有bug 或更好的想法欢迎提出！
* @since 1.0.0
* @copyright Jeff  http://DeveWork.com
*/

/*__________________________________________定义全局变量________________________________________*/
require('includes/update-notifier.php');

include_once(TEMPLATEPATH . '/includes/theme-options.php');
/*__________________________________________基本WordPress theme架构代码________________________________________*/

/**
 * 导航菜单
 * @version 1.0.0
 * @author WordPress
 *
 */
register_nav_menus(array(
      'menu-primary' => 'Bevework顶部导航菜单',
    ));

/**
 * 侧边栏
 * @version 1.0.0
 * @author WordPress
 *
 */
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Bevework 侧边栏',
        'id' => 'dw_side_bar',
        'description' => 'Bevework 侧边栏',
        'before_widget' => '<ul class="w-container"><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li></ul>',
        'before_title' => '<h3 class="w-title">',
        'after_title' => '</h3>'
    ));
    }

/*______________________________________________常见基本函数___________________________________________________*/

/**
 * 删除头部亢余代码
 *
 * @version 1.0.0
 * @author wp
 *
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'feed_links_extra', 3);// 额外的feed,例如category, tag页

/**
 * 删除多余的小工具，搜索，日历
 *
 * @version 1.0.0
 * @author wp
 *
 */
function dw_unregister_widget(){
unregister_widget('WP_Widget_Search');
unregister_widget('WP_Widget_Calendar');
}
add_action('widgets_init','dw_unregister_widget');

/**
 * title 自定义
 *
 * @version 1.0.0
 * @author Jeff ~ DeveWork.com
 * @internal 用于浏览器的标题
 *
 */
function get_page_number() {
    if ( get_query_var('paged') ) {print ' | ' . '第'. get_query_var('paged') . '页';}}
function dw_meta_title(){
        if ( is_single() ) { 
            single_post_title(); echo ' | '; bloginfo( 'name' );
        } elseif ( is_home() || is_front_page() ) {
            bloginfo( 'name' );
            if( get_bloginfo( 'description' ) ) {
              echo ' | ' ; bloginfo( 'description' ); get_page_number();
            }
        } elseif ( is_page() ) {
            single_post_title( '' ); echo ' | '; bloginfo( 'name' );
        } elseif ( is_search() ) {
            printf( __( '有关 %s 的搜索结果：', 'Geekwork' ), '"'.get_search_query().'"' ); get_page_number(); echo ' | '; bloginfo( 'name' );
        } elseif ( is_404() ) { 
            _e( '404 Not Found', 'Geekwork' ); echo ' | '; bloginfo( 'name' );
        } else { 
            wp_title( '' ); echo ' | '; bloginfo( 'name' ); get_page_number();
        }
    }

/**
 * 分页导航代码
 *
 * @version 1.0.0
 * @author wp
 *
 */
function dw_page_navi() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<div class="page-nav clearfix"><div class="wrap">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '&larr;',
    'next_text'    => '&rarr;',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</div></div><!--.page-nav-->';
}

/**
 * 浏览次数函数设置
 *
 * @version 1.0.0
 * @author http://devework.com/wordpress-post-views.html
 * @internal 要使用在loop 中方可正确运行，数据通过post-meta保存在数据库中
 *
 */
function getPostViews($postID){   
     $count_key = 'post_views_count';   
     $count = get_post_meta($postID, $count_key, true);   
     if($count==''){   
         delete_post_meta($postID, $count_key);   
         add_post_meta($postID, $count_key, '0');   
         return "0";   
     }   
     return $count;   
 }   
 function setPostViews($postID) {   
     $count_key = 'post_views_count';   
     $count = get_post_meta($postID, $count_key, true);   
     if($count==''){   
         $count = 0;   
         delete_post_meta($postID, $count_key);   
         add_post_meta($postID, $count_key, '0');   
     }else{   
         $count++;   
         update_post_meta($postID, $count_key, $count);   
     }   
 } 

/**
 * 面包屑导航函数
 *
 * @version 1.0.0
 * @author http://devework.com/wordpress-breadcrumbs.html
 *
 */
function dw_breadcrumb() { ?>
<a href="<?php echo get_option('Home'); ?>">首页</a> &raquo;
<?php
  if( is_single() ){
  $categorys = get_the_category();
  $category = $categorys[0];
  echo( get_category_parents($category->term_id,true,' &raquo; ') );echo '正文';
  } elseif ( is_page() ){
  the_title();
  } elseif ( is_category() ){
  single_cat_title();
  } elseif ( is_tag() ){
  single_tag_title();
  } elseif ( is_day() ){
  the_time('Y年Fj日');
  } elseif ( is_month() ){
  the_time('Y年F');
  } elseif ( is_year() ){
  the_time('Y年');
  } elseif ( is_search() ){
  echo $s.' 的搜索结果';
  }elseif ( is_404() ) {
  echo '没有相关内容';
  }
?>
<?php }


/**
 * 百度分享代码
 *
 * @version 1.0.0
 * @author baidu
 *
 */
function baidu_share(){?>
    <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php }


/**
 * 评论回复自定义函数
 *
 * @version 1.0.0
 * @author wp
 *
 */
function dw_comment($comment, $args, $depth) {$GLOBALS['comment'] = $comment;
    global $commentcount,$wpdb, $post;
     if(!$commentcount) { 
          $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = '' AND comment_approved = '1' AND !comment_parent");
          $cnt = count($comments);
          $page = get_query_var('cpage');
          $cpp=get_option('comments_per_page');
         if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))) {
             $commentcount = $cnt + 1;
         } else {$commentcount = $cpp * $page + 1;}
     }
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>" itemprop="reviews" itemscope itemtype="http://schema.org/Review" >
   <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
      <?php $add_below = 'div-comment'; ?>
        <div class="comment-author vcard">         
         <div id="avatar"><?php echo get_avatar( $comment, 40 ); ?></div>
    <div class="floor">
    <?php 
    // if(!$parent_id = $comment->comment_parent){switch ($commentcount){
     // case 2 :echo "传说中的沙发";--$commentcount;break;
     // case 3 :echo "板凳也不错";--$commentcount;break;
     // case 4 :echo "赶上地板鸟";--$commentcount;break;
     // default:printf('%1$s#', --$commentcount);}}
    ?>
    </div>
    <strong itemprop="author"><?php comment_author_link() ?></strong>:<?php edit_comment_link('编辑','&nbsp;&nbsp;',''); ?></div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
        <span style="color:#C00; font-style:inherit">您的评论正在等待审核中...</span>
        <br />          
        <?php endif; ?>
        <div  itemprop="reviewBody"><?php comment_text() ?></div>
        <div class="clear"></div><span class="datetime" itemprop="datePublished"><?php comment_date('Y-m-d') ?> <?php comment_time() ?> </span> <span class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => '[回复]', 'add_below' =>$add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
  </div>
<?php
}
function dw_end_comment() {echo '</li>';};
//登陆显示头像
function dw_own_avatar($email, $size = 48){
return get_avatar($email, $size);
};


/**
 * 反垃圾评论
 *
 * @version 1.0.0
 * @author willliamkan
 *
 */
class anti_spam {
  function anti_spam() {
    if ( !current_user_can('level_0') ) {
      add_action('template_redirect', array($this, 'w_tb'), 1);
      add_action('init', array($this, 'gate'), 1);
      add_action('preprocess_comment', array($this, 'sink'), 1);
    }
  }
  function w_tb() {
    if ( is_singular() ) {
      ob_start(create_function('$input','return preg_replace("#textarea(.*?)name=([\"\'])comment([\"\'])(.+)/textarea>#",
      "textarea$1name=$2w$3$4/textarea><textarea name=\"comment\" cols=\"100%\" rows=\"4\" style=\"display:none\"></textarea>",$input);') );
    }
  }
  function gate() {
    if ( !empty($_POST['w']) && empty($_POST['comment']) ) {
      $_POST['comment'] = $_POST['w'];
    } else {
      $request = $_SERVER['REQUEST_URI'];
      $referer = isset($_SERVER['HTTP_REFERER'])         ? $_SERVER['HTTP_REFERER']         : '隐瞒';
      $IP      = isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] . ' (透过代理)' : $_SERVER["REMOTE_ADDR"];
      $way     = isset($_POST['w'])                      ? '手动操作'                       : '未经评论表格';
      $spamcom = isset($_POST['comment'])                ? $_POST['comment']                : null;
      $_POST['spam_confirmed'] = "请求: ". $request. "\n来路: ". $referer. "\nIP: ". $IP. "\n方式: ". $way. "\n內容: ". $spamcom. "\n -- 记录成功 --";
    }
  }
  function sink( $comment ) {
    if ( !empty($_POST['spam_confirmed']) ) {
      if ( in_array( $comment['comment_type'], array('pingback', 'trackback') ) ) return $comment;
      
      die();
      //方法二: 标记为 spam, 留在资料库检查是否误判.
      //add_filter('pre_comment_approved', create_function('', 'return "spam";'));
      //$comment['comment_content'] = "[ 小墙判断这是 Spam! ]\n". $_POST['spam_confirmed'];
    }
    return $comment;
  }
}
$anti_spam = new anti_spam();

/**
 * 自定义标签云
 *
 * @version 1.0.0
 * @author wp
 *
 */
add_filter('widget_tag_cloud_args','style_tags'); 
function style_tags($args) { 
$args = array( 
'largest'=> '11', 
'smallest'=> '11',
'order'  => 'RAND',   
'number' => '30',  
); 
return $args; 
}


 ?>