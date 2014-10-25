<?php if ( ! defined( 'ABSPATH' ) ) exit;?>
<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
					<div class="title">
						<a target="_blank" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 60 ); ?></a>
						<h1><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="title-meta">
							<span class="date"><?php the_time('Y/m/j'); ?></span>
							<span class="author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">作者：<?php the_author(); ?></a></span>
							<span class="view">浏览数(<?php echo number_format(getPostViews(get_the_ID())); ?>)</span>
							<span class="com"><?php comments_popup_link('暂无评论', '评论(<em>1</em>)', '评论(<em>%</em>)'); ?></span>
							<?php if(is_user_logged_in())  {?><span class="edit"><?php edit_post_link(); ?></span><?php } ?>
						</div><!-- .title-meta -->
					</div><!-- .title -->
					<div class="featured_image aligncenter">
						<img width="685" height="280" src="<?php beve_post_img_url();?>">
					</div><!-- .featured_image -->
					<section class="clearfix">
						<div class="entry">
							<a href="<?php the_permalink(); ?>">
								<?php
								if (post_password_required()):the_content(); else :
      								{
      									echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0,250,"...");
        						}endif;
								 ?>
							</a>
						</div><!-- .entry -->
						<div class="btn">
							<a target="_blank" rel="nofollow" href="//service.weibo.com/share/share.php?title=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><span class="weibo"><i class="icon-weibo"></i></span><p>微博分享</p></a>
							<a target="_blank" rel="nofollow" href="//pan.baidu.com/share/qrcode?w=200&h=200&url=<?php the_permalink(); ?>"><span class="com"><i class="icon-wechat"></i></span><p>微信分享</p></a>
							<a href="<?php the_permalink(); ?>"><span class="readmore"><i class="icon-right"></i></span><p>阅读更多</p></a>
						</div><!-- .btn -->
					</section>
				</article>