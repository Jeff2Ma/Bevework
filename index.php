<?php
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( '无权限直接访问本文件！' );
}
?>
<?php get_header();?>

			<div class="" id="content"><!-- 正文 -->


				<?php //按需加载相关不同分类角度的文章，还有作者，日期……
                if (is_tag()): ?>
                    <div class="post-placeholder">标签为 <em><?php echo single_tag_title(); ?> </em> 的文章：</div>
                <?php elseif (is_category()):?>
                    <div class="post-placeholder">分类为 <em><?php echo single_cat_title(); ?> </em> 的文章：</div>
                <?php elseif (is_author()):?>
                    <div class="post-placeholder">作者为 <em><?php echo the_author_meta( 'display_name' );?></em> 的文章：</div>


                <?php endif;?>



                <?php if (have_posts()) :while (have_posts()) : the_post();
                	//加载首页模板
                	get_template_part('post');
                endwhile;
                	//分页导航
           			dw_page_navi();
                else ://如果木有文章
                    get_template_part('post', 'noresults');
                endif; 
            ?>


			</div> <!-- #content -->
		
			<?php get_sidebar(); ?>
		</main>
	</div><!-- #container -->
<?php get_footer(); ?>