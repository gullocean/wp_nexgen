<?php 
// Template Name: Template - FAQ
get_header();
?>

<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="service_body_innr">
					<div class="brd_camp">
						<ul>
							<li>Nexgen Australia</li>
						</ul>
					</div>
					<p></p>
					
					
					
					<div class="innr_img3">
					<?php
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					if ($image) : ?>
					<img src="<?php echo $image[0]; ?>" alt="" />
					<?php endif; ?>
					</div>
					
					<div class="finance7">
					<ul>
					
					<?php
					$i=1;
					global $post;
					$myposts = get_posts( $args );
					$myposts = get_posts('numberposts=-1&post_type=cp-faq&orderby=menu_order&order=asc');
					foreach( $myposts as $post  ) :
						setup_postdata($post);
						$getContent = get_the_content();
						$getContent = apply_filters('<p>'.the_content.'</p>', $getContent);
					$getContent = str_replace(']]>', ']]&gt;', $getContent);
					?>		
					<li><a href="#<?php echo $post->ID; ?>"><?php echo $i; ?>. <?php echo get_the_title(); ?></a></li>
					<?php 
					$i++;
					endforeach;?>
					
					</ul>
					</div>
					
					<?php
					$i=1;
					global $post;
					$myposts = get_posts( $args );
					$myposts = get_posts('numberposts=-1&post_type=cp-faq&orderby=menu_order&order=asc');
					foreach( $myposts as $post  ) :
						setup_postdata($post);
						$getContent = get_the_content();
						$getContent = apply_filters('<p>'.the_content.'</p>', $getContent);
					$getContent = str_replace(']]>', ']]&gt;', $getContent);
					?>	
					<div id="<?php echo $post->ID; ?>" class="faq_q">
					<h3><span><?php echo $i; ?>. <?php echo get_the_title(); ?></span></h3>
					<?php echo get_the_content(); ?>
				   </div>
				   <?php 
					$i++;
					endforeach;?>
				   
   
  
   
  

                      
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





