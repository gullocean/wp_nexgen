<?php
/**
 * The Template for displaying all single posts.
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
						<div class="blog_in">
							<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
							<p><span><?php echo get_the_date('j M Y'); ?> </span> | <span><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span></p>
							
								<?php
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
								if ($image) : ?>
								<div class="blog_img">
								<img src="<?php echo $image[0]; ?>" alt=""/>
								</div>
								<?php endif; ?>
							
							<?php the_content(); ?>
						</div>
						<?php comments_template( '', true ); ?>
						<?php endwhile; ?>
					</div>
					</div>
				</div>
				</div>
</section>
<?php get_footer(); ?>
