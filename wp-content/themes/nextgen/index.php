<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>


<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				
					<div class="brd_camp">
						<ul>
							<li>Blog</li>
						</ul>
					</div>
				
					</div>
					<div class="col-sm-3">
						<div class="blog_lft">
							
							<?php dynamic_sidebar ('blog-sidebar-widget-area'); ?>
							
						</div>
					</div>
					<div class="col-sm-9">
						<div class="blog_dtl">
							<h3>Recent Posts</h3>
							
							<?php
							/* Run the loop to output the posts.
							 * If you want to overload this in a child theme then include a file
							 * called loop-index.php and that will be used instead.
							 */
							 get_template_part( 'loop', 'index' );
							?>
							
							
							
						</div>
					</div>
				</div>
				</div>
</section>






<?php get_footer(); ?>
