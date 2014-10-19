<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php get_header();?>
			<div class="" id="content"><!-- 正文 -->

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article <?php post_class('single clearfix'); ?> id="post-<?php the_ID(); ?>">

					<div class="title">
						<span class="border"></span>
						<div class="crumbs">首页》正文</div>
						<h1><?php the_title(); ?></h1>
						<div class="single-meta">
							<div class="info clearfix">
            					<a class="author" href=""><img width="38" height="38" src="<?php bloginfo('template_url'); ?>/images/author.jpg"></a>
								<a class="name" href="">发布者：Kirk</a>
								<div class="stat">
									<span class="date">日期：2013/08/05</span>
									<span class="view">浏览(251)</span>
									<span class="com"><a href=" ">评论(20)</a></span>
								</div> <!-- .stat -->
							</div> <!-- .info -->
						</div><!-- single.meta -->


					</div><!-- .title -->


			
					<section class="entry clearfix">
						<div class="aligncenter">
							<img src="<?php bloginfo('template_url'); ?>/images/sam.jpg">
						</div><!-- . -->
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