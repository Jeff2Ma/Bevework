<?php
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( '无权限直接访问本文件！' );
}
?>
<?php get_header();?>

			<div class="" id="content"><!-- 正文 -->
				<?php 
                if (have_posts()) : while (have_posts()) : the_post();
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