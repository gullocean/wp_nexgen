<?php 
// Template Name: Template - Business
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
						<!-- <ul>
							<li><a href="#">Services</a></li>
							<li><a href="#"> > Phone Systems</a></li>
							<li><a href="#"> > Large Business  </a></li>
						</ul> -->
					</div>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				 
				 
				<?php
				$no_of_post = get_field('num_of_post');
				$get_category = get_field('product_category');
				global $post;
				$args = array( 'posts_per_page' => $no_of_post, 'category' => $get_category );
				$myposts = get_posts( $args );
				//$myposts = get_posts('numberposts=3&category=.$get_category');
				//print_r($myposts);
				foreach( $myposts as $post  ) :
					setup_postdata($post);
					$getContent = get_the_content();
					$getContent = apply_filters('<p>'.the_content.'</p>', $getContent);
					$getContent = str_replace(']]>', ']]&gt;', $getContent); ?> 
				<div class="col-sm-4">
					<div class="round_icon_bx2 product_full_holder">
	                    <div class="product_holder">
	                    	<a href="<?php the_permalink(); ?>">
								<?php
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
								if ($image) : ?>
								<img src="<?php echo $image[0]; ?>" alt="" />
								<?php endif; ?>
		                        <div class="rolloverlayer">&nbsp;</div>
	                        </a>
	                    </div>
						<h5><a href="<?php the_permalink(); ?>" style="color:#e31e25;"><?php echo get_the_title(); ?></a></h5>
						<div class="icon_acn">
							<a href="<?php the_permalink(); ?>">Find out more</a>
						</div>
					</div>
				</div>
				<?php endforeach; wp_reset_postdata();
				?>
				
				<?php 
				if( have_rows('add_flex_content') ):
				 ?>
				<div class="col-sm-12">
					<div class="red_anc">
						<div class="red_anc2">
						<a href="<?php the_field('more_url'); ?>">View our handsets Here</a>
						</div>
					</div>
				</div>
				
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