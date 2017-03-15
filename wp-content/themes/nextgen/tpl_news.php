<?php 
// Template Name: Template - News
get_header();
?>


<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="brd_camp">
						<ul>
							<li><?php the_title(); ?></li>
						</ul>
					</div>
				<?php endwhile; ?>	
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
							$temp = $wp_query;
							$wp_query= null;
							$wp_query = new WP_Query();
							$wp_query->query('post_type=latest_news'.'&showposts=10'.'&paged='.$paged);
							?>
							<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
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
								
								<p><?php echo strlen(substr(strip_tags(get_the_content()),0,200)) ?substr(strip_tags(get_the_content()),0,300).'&hellip;&nbsp;&nbsp;
	  <a href="'.get_permalink($post->ID).'">Read More</a>' : get_the_content().'&nbsp;&nbsp; <a href="'.get_permalink($post->ID).'"> Read More </a>';?> </p>
							</div>
							<?php endwhile; ?>
							
							<div class="pagination">
							<div class="page_listing">
								<?php echo paginate_links( $args ); ?>
							</div>
							</div>
							<?php $wp_query = null; $wp_query = $temp;?>
						</div>
					</div>
				</div>
				</div>
</section>



<?php get_footer(); ?>