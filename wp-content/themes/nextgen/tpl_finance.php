<?php 
// Template Name: Template - Finance
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
							<li><?php the_title(); ?></li>
						</ul>
					</div>
					<?php the_content(); ?>

					
					
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