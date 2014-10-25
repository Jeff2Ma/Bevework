<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php get_header();?>
			<div class="" id="content"><!-- 正文 -->

  <?php if (have_posts()) : while (have_posts()) : the_post();setPostViews(get_the_ID()); ?>

				<article <?php post_class('single clearfix'); ?> id="post-<?php the_ID(); ?>">

					<div class="title">
						<span class="border"></span>
						<div class="crumbs"><?php dw_breadcrumb(); ?></div>
						<h1><?php the_title(); ?></h1>
						<div class="single-meta">
							<div class="info clearfix">
            					<a class="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 40 ); ?></a>
								<a class="name" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">发布者：<?php the_author(); ?></a>
								<div class="stat">
									<span class="date"><?php the_time('Y/m/j'); ?></span>
									<span class="view">浏览数(<?php echo number_format(getPostViews(get_the_ID())); ?>)</span>
									<span class="cat">分类：<?php the_category(', '); ?></span>
									<span class="com"><?php comments_popup_link('暂无评论', '评论(<em>1</em>)', '评论(<em>%</em>)'); ?></span>
									<?php if(is_user_logged_in())  {?><span class="edit"><?php edit_post_link(); ?></span><?php } ?>
								</div> <!-- .stat -->
							</div> <!-- .info -->
						</div><!-- single.meta -->


					</div><!-- .title -->


			
					<section class="entry clearfix">
						
						<?php if (beve_option('dw_singlefigur')){ ?>
						<div class="aligncenter">
							<img src="<?php beve_post_img_url();?>">
						</div><!-- . -->
						<?php } ?>
						
						  <?php the_content('');?>

						  <?php baidu_share(); ?>

						  <div class="related-post">
						  	
						  </div> <!-- .related-post -->
					</section>

					

				</article>


<?php 
        if(comments_open( get_the_ID() ))  {
            comments_template('', true); 
        }
    ?>



<?php endwhile; ?>
            <?php else : ?>
              <article id="post-not-found" class="hentry cf">
                  <p>暂无文章</p>
              </article>
            <?php endif; ?>

				</div> <!-- #content -->
		
			<?php get_sidebar(); ?>
		</main>
	</div><!-- #container -->
<?php get_footer(); ?>