<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				
<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="brd_camp">
						<ul>
							<li><?php printf( __( 'Category Archives: %s', 'twentyten' ), '' . single_cat_title( '', false ) . '' ); ?></li>
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
							



						<div class="blog_in brdr">
							<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
							<p><span><?php echo get_the_date('j M Y'); ?> </span> | <span><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span></p>
							<div class="blog_img">
								<?php
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
								if ($image) : ?>
								<img src="<?php echo $image[0]; ?>" alt=""/>
								<?php endif; ?>
							</div>
							<p><?php echo strlen(substr(strip_tags(get_the_content()),0,100)) ?substr(strip_tags(get_the_content()),0,100).'&hellip;&nbsp;&nbsp;
		  <a href="'.get_permalink($post->ID).'">Read More</a>' : get_the_content().'&nbsp;&nbsp; <a href="'.get_permalink($post->ID).'"> Read More </a>';?> </p>
						</div>
						
						
					</div>
					</div>
				</div>
				</div>
</section>				
				
				
	<?php endwhile; ?>			
<?php get_footer(); ?>
