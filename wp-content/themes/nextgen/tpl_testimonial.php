<?php 
// Template Name: Template - Testimonial
get_header();
?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="service_body">
	<div class="container">
		<div class="row"><div class="service_body_innr">
			<div class="col-sm-12">
				
					<div class="brd_camp">
						<ul>
							<li><?php the_title(); ?></li>
						</ul>
					</div>
					<p></p>
					
					
					<?php if( have_rows('add_testimonial_repeater') ): ?>
					<?php while( have_rows('add_testimonial_repeater') ): the_row(); 
					$testimonial_image = get_sub_field('testimonial_image');
					$testimonial_content = get_sub_field('testimonial_content');	
					?>
					<div class="testimonials">
						<img src="<?php echo $testimonial_image; ?>" alt="" />
						<?php echo $testimonial_content; ?>
					</div> 
					<?php endwhile; ?>
					<?php endif; ?>
					
					
					</div>
					</div>
				   </div>
				</div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>