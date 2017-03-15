<?php 
// Template Name: Template - Full Width
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
							<li><?php the_title(); ?></li>
						</ul>
					</div>
					<p></p>
					<?php the_content(); ?>

					
					
				</div>
			</div>
					
		 </div>
		
	</div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>