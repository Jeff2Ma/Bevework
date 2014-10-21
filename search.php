<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header();?>
      <div class="" id="content"><!-- 正文 -->

  <?php if (have_posts()) :?>
      <div class="post-placeholder"><?php printf( __( '有关“ %s ”的搜索结果如下：', 'Bevework' ), '<strong>' . get_search_query() . '</strong>' ); ?></div>
  <?php while (have_posts()) :the_post();
                  //加载首页模板
                  get_template_part('post');
                endwhile;
                  //分页导航
                dw_page_navi();

              else://搜索没有结果
              ?>
              <article id="search-page" class="post">
                  <p style="color:red;"><?php printf( __( '根据相关法律法规和政策，有关“ %s ”的搜索结果未予显示。', 'Bevework' ), '<strong>' . get_search_query() . '</strong>' ); ?></p>
                        </br></br>
                        <p>╮(╯_╰)╭  淡定，其实是找不到该词的搜索结果。</p>
              </article>
            <?php endif; ?>

        </div> <!-- #content -->
    
      <?php get_sidebar(); ?>
    </main>
  </div><!-- #container -->
<?php get_footer(); ?>