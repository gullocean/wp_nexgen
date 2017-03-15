<?php 
// Template Name: Template - Parent Page
get_header();
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
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
					<div id="cartintro" class="prd_detl_par">
					<?php the_content(); ?>
					</div>
				
				
				<?php
				$i=1;
				$get_category = get_field('product_category');
				$this_category_id=get_query_var('cat');
				$args=array(
				'parent' => $get_category,
				'orderby' => 'name',
				'order' => 'ASC',
				'hide_empty' => 0
				);
				
				$categories=get_categories($args);
				foreach($categories as $category) {
				$category_image=get_field('category_image', 'category_'.$category->cat_ID); 
				$hover_image=get_field('hover_image', 'category_'.$category->cat_ID); 
				$link_to_page=get_field('link_to_page', 'category_'.$category->cat_ID);
				?> 	
				<div class="col-sm-4">
					<div class="round_icon_bx2 product_full_holder">
						<div class="product_holder">
							<a href="<?php echo $link_to_page; ?>"><img src="<?php echo $category_image; ?>" alt="" border="0" onmouseover="this.src='<?php echo $hover_image; ?>'" onmouseout="this.src='<?php echo $category_image; ?>'" /></a>
						</div>						
						<h5><a href="<?php echo $link_to_page; ?>"><?php echo $category->name; ?></a></h5>
						<h4><?php echo $category->description; ?></h4>
						<div class="icon_acn">
							<a href="<?php echo $link_to_page; ?>">Find out more</a>
						</div>
					</div>
				</div>
				<?php	$i++;	} ?>
				
				<?php 
				if( have_rows('add_flex_content') ):
				?>
				<?php if(get_field('more_url')){ ?>	   
				<div class="col-sm-12">
					<div class="red_anc">
						<div class="red_anc2">
						<a href="<?php the_field('more_url'); ?>">View our handsets Here</a>
						</div>
					</div>
				</div>
			<?php }	?>
				<?php
				
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