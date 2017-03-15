<?php 
// Template Name: Template - Two Column With Sidebar
get_header();
?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="service_body_innr">
					<div class="brd_camp">
						<ul>
							<li><?php the_field('short_heading'); ?></li>
						</ul>
						
					</div>
					<p></p>
					<?php the_content(); ?>
				
				
				
				<?php
				if( have_rows('add_flex_content') ):
				    while ( have_rows('add_flex_content') ) : the_row();
				        if( get_row_layout() == 'full_width_content' ): ?>
				
				<div class="col-sm-12">
					<?php the_sub_field('full_width_content'); ?>
				</div>
				<?php  elseif( get_row_layout() == '2_column_content' ):  ?>
				<div class="col-sm-6">
					<div class="loyer_cost">
						<?php the_sub_field('left_content'); ?>	
					</div>
				</div>
				<div class="col-sm-6">
					<div class="loyer_cost">
						<?php the_sub_field('right_content'); ?>
					</div>
				</div>
				<?php endif;
				    endwhile;
				else :
				    // no layouts found
				endif;
				?>
				
				
				
				
				
				</div>
			</div>
			<div class="col-sm-3">
				<div class="service_body_innr2">
					<?php dynamic_sidebar ('sidebar-widget-area'); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="make_the_switch_main">
					<div class="make_the_switch">
						<?php dynamic_sidebar ('footer-box-widget-area'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>