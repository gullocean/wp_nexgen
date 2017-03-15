<?php 
// Template Name: Template - Mission
get_header();
?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="service_body">
	<div class="container">
		<div class="row"><div class="service_body_innr">
			<div class="col-sm-12">
				
					<div class="brd_camp">
						<ul>
							<li><?php the_field('short_content'); ?></li>
						</ul>
					</div>
					<p></p><?php the_content(); ?>
			</div>
				<div class="col-sm-4">
					<div class="mission">
							<?php the_field('mission_content'); ?>
					</div>
					<div class="mission">
							<?php the_field('work_smart_content'); ?>
					</div>
					<div class="mission">
							<?php the_field('winning_content'); ?>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="mission">
							<?php the_field('vission_content'); ?>
					</div>
					<div class="mission">
							<?php the_field('brand_content'); ?>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="mission">
							<?php the_field('act_like_owner_content'); ?>
					</div>
					<div class="mission">
							<?php the_field('focus_market_content'); ?>
					</div>
				</div>
				
				
				
				
				</div>
		</div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>