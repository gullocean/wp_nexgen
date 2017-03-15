<?php 
// Template Name: Template - Career
get_header();
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="service_body_innr">
					<div class="brd_camp">
						<ul>
							<li><?php the_field('short_heading'); ?></li>
						</ul>
					</div>
					<p></p>
					<?php the_content(); ?>

					</div>
					</div>
				<div class="col-sm-6">
					<div class="office_img">
						
						<?php if( have_rows('add_career_repeater') ): ?>
						<?php while( have_rows('add_career_repeater') ): the_row(); 
						$career_image = get_sub_field('career_image');
						$career_caption = get_sub_field('career_caption');	
						$external_link = get_sub_field('external_link');
						?>
						<div class="office_bx">
							<div class="office_bx_img">
							<a href="<?php echo $external_link; ?>"><img src="<?php echo $career_image; ?>" alt="" /></a>
							</div>
							<a href="<?php echo $external_link; ?>"><?php echo $career_caption; ?></a>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
						
						
				
					
					<div class="contact_main_frm">
						<?php echo do_shortcode('[contact-form-7 id="353" title="Career Contact Form"]'); ?>
						

					</div>
						</div>
				</div>
				
				
				
				
				
				
				</div>
		</div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>