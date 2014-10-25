<?php 
if ( ! defined( 'ABSPATH' ) ) exit; get_header();?>
            <div class="" id="content"><!-- 正文 -->
                <article <?php post_class('single clearfix'); ?> id="post-<?php the_ID(); ?>">

                    <div class="title">
                        <span class="border"></span>
                        <div class="crumbs">首页》正文</div>
                        <h1><?php the_title(); ?></h1>
                        <div class="single-meta">
                            <div class="info clearfix">
                                <a class="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 40 ); ?></a>
                                <a class="name" href="">发布者：<?php the_author(); ?></a>
                                <div class="stat">
                                    <span class="date"><?php the_time('Y/m/j'); ?></span>
                                    <span class="com"><?php comments_popup_link('暂无评论', '评论(<em>1</em>)', '评论(<em>%</em>)'); ?></span>
                                </div> <!-- .stat -->
                            </div> <!-- .info -->
                        </div><!-- single.meta -->


                    </div><!-- .title -->


            
                    <section class="entry clearfix">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile;endif; ?>

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


                </div> <!-- #content -->
        
            <?php get_sidebar(); ?>
        </main>
    </div><!-- #container -->
<?php get_footer(); ?>
 ?>