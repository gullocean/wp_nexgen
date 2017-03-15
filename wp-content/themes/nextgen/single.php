<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<section class="australias_prt">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="inner_body">
				<h2><?php the_field('short_heading'); ?></h2>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="service_body_innr">
					<div class="brd_camp">
						<?php if(function_exists('bcn_display'))
					    {
					        bcn_display();
					    }?>
						
					</div>

			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
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
<?php get_footer(); ?>
