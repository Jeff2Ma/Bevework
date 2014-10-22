<?php if ( ! defined( 'ABSPATH' ) ) exit;?>
<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
					<div class="title">
						<a target="_blank" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 60 ); ?></a>
						<h1><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="title-meta">
							<span class="date"><?php the_time('Y/m/j'); ?></span>
							<span class="author">作者：<?php the_author(); ?></span>
							<span class="view">浏览数(<?php echo number_format(getPostViews(get_the_ID())); ?>)</span>
							<span class="com"><?php comments_popup_link('暂无评论', '评论(<em>1</em>)', '评论(<em>%</em>)'); ?></span>
						</div><!-- .title-meta -->
					</div><!-- .title -->
					<div class="featured_image aligncenter">
						<img src="<?php bloginfo('template_url'); ?>/images/sam.jpg">
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
							<a href=""><span class="weibo"></span><p>新浪微博</p></a>
							<a href=""><span class="com"></span><p>我要评论</p></a>
							<a href="<?php the_permalink(); ?>"><span class="readmore"></span><p>阅读更多</p></a>
						</div><!-- .btn -->
					</section>
				</article>