<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
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
							<li>BLOG</li>
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
							

						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						<div class="blog_in brdr">
							<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
							<p><span><?php echo get_the_date('j M Y'); ?> </span> | <span><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span></p>
							<?php
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
								if ($image) : ?>
							<div class="blog_img">
								
								<img src="<?php echo $image[0]; ?>" alt=""/>
								
							</div>
							<?php endif; ?>
							<p><?php echo strlen(substr(strip_tags(get_the_content()),0,300)) ?substr(strip_tags(get_the_content()),0,300).'&hellip;&nbsp;&nbsp;
		  <a href="'.get_permalink($post->ID).'">Read More</a>' : get_the_content().'&nbsp;&nbsp; <a href="'.get_permalink($post->ID).'"> Read More </a>';?> </p>
						</div>
						<?php endwhile; ?>
						<?php comments_template( '', true ); ?>	
					</div>
					<div id="nav-below" class="navigation archive">					
					<?php if(function_exists('wp_paginate')) {
					    wp_paginate();
						} ?>				
					</div><!-- #nav-below -->
					</div>
				</div>
				</div>
				
</section>


				

<?php get_footer(); ?>
