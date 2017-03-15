<?php 
// Template Name: Template - Services
get_header();
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
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
					
					<br /><?php echo get_the_category_list(); ?>
					
					
				<?php //echo get_category_parents( $cat, true, ' &raquo; ' ); ?>
				
				
				<!-- <div class="col-sm-4">
					<div class="round_icon_bx2">
						<a href="<?php echo $link_to_page; ?>"><img src="<?php echo $category_image; ?>" alt="" border="0" onmouseover="this.src='<?php echo $hover_image; ?>'" onmouseout="this.src='<?php echo $category_image; ?>'" /></a>
						<a href="<?php echo $link_to_page; ?>"><?php echo $category->name; ?></a>
						<h4><?php echo $category->description; ?></h4>
						<div class="icon_acn">
							<a href="<?php echo $link_to_page; ?>">Find out more</a>
						</div>
					</div>
				</div> -->
				
				
				
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