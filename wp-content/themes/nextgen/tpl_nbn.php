<?php 
// Template Name: Template - NBN
get_header();
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="service_body_innr">
			<div class="col-sm-12">
					<div class="brd_camp">
						<ul>
							<li><?php the_field('short_heading'); ?></li>
						</ul>
					</div>
					<p></p>
					<?php the_content(); ?>
			       
					</div>
					
					<?php if( have_rows('three_column_panel') ): ?>
					<?php while( have_rows('three_column_panel') ): the_row(); 
					$heading = get_sub_field('heading');
					$image = get_sub_field('image');	
					$button = get_sub_field('button');
						$btn_url = get_sub_field('btn_url');
					?>
					<div class="col-sm-4">
						<div class="nbn_box nbn_new_bx">
							<h2><a href="<?php echo $btn_url; ?>"><?php echo $heading; ?></a></h2>							
							<div class="round_icon_bx2Img">
							<a href="<?php echo $btn_url; ?>"><img src="<?php echo $image; ?>" alt=""></a>
							</div>
							<a href="<?php echo $btn_url; ?>"><?php echo $button; ?></a>
						</div>
					</div>
					<?php endwhile; ?>
		     		<?php endif; ?>

					
					
					
					<?php the_field('above_map_content'); ?>
					<div class="col-sm-12">
						<h3><span>NBN rollout map</span></h3>
						<div class="map_nbn">
							<iframe scrolling="no" src="http://www.nbnco.com.au/iframe/rollout-map.html" width="940" height="200" scrolling="no"></iframe>
							

<!-- <img src="<?php bloginfo('template_url'); ?>/images/map.jpg" alt="" /> -->
						</div>
					</div>
					<div class="col-sm-12">	
						<?php the_field('below_map_content'); ?>

					</div>
					<?php the_field('6_ways_nbn_can_help'); ?>
					
					
					<div class="col-sm-12">
						<?php the_field('above_footer_content'); ?>

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
				   </div>
				</div>
</section>


<?php endwhile; ?>



<?php get_footer(); ?>