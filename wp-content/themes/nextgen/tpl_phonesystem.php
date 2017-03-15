<?php 
/* Template Name: Template - Phone System */
get_header();
?>
<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="service_body_innr">
					<div class="brd_camp">
						<ul>
							<li><a href="#">Services</a></li>
							<?php while ( have_posts() ) : the_post(); ?>
							<li><a href="#"> > <?php echo the_title();?></a></li>
							<?php endwhile;?>
						</ul>
					</div>
                    
					<?php while ( have_posts() ) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php echo get_the_content();?>
				<?php endwhile;?>
				
					<?php 
					  	$i=0;
					  	while( have_rows('below_content') ): the_row(); ?>
<div class="col-sm-4">
	
	<div class="round_icon_bx2">
						<div class="round_icon_bx2Img">
							<a href="<?php echo the_sub_field('link');?>"><img src="<?php echo the_sub_field('image1');?>" alt="" border="0" onmouseover="this.src='<?php echo the_sub_field('image2');?>'" onmouseout="this.src='<?php echo the_sub_field('image1');?>'" /></a>
						</div>
							<a href="<?php echo the_sub_field('link');?>"><?php echo the_sub_field('title');?></a>
						<h4><?php echo the_sub_field('text');?></h4>
						<div class="icon_acn">
							<a href="<?php echo the_sub_field('link');?>">Find out more</a>
						</div>
					</div>
	
					
				</div>
					    
					     <?php $i++; endwhile; ?>
				
				
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-sm-12">
					<div class="red_anc">
						<div class="red_anc2">
							
							<?php the_field('our_handsets');?>
								
						
						</div>
					</div>
				</div>
				<?php endwhile;?>
				<?php while ( have_posts() ) : the_post(); ?>
			<?php echo the_field('mid_content');?>
			<?php endwhile;?>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="service_body_innr2">
					<?php 
					  	$i=0;
					  	while( have_rows('sidebar_content') ): the_row(); ?>

					<div class="round_icon_bx2">
						<a href="<?php echo the_sub_field('link');?>" style="background: none; padding: 0;"><img src="<?php echo the_sub_field('image1');?>" alt="" border="0" onmouseover="this.src='<?php echo the_sub_field('image2');?>'" onmouseout="this.src='<?php echo the_sub_field('image1');?>'" /></a>
						
						<h4><?php echo the_sub_field('title');?></h4>
						<a href="<?php echo the_sub_field('link');?>"><?php echo the_sub_field('text');?></a>
					</div>
			
					    
					     <?php $i++; endwhile; ?>
					
					
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="make_the_switch_main">
				<div class="make_the_switch">
					<?php while ( have_posts() ) : the_post(); ?>
			<?php echo the_field('footer_content');?>
			<?php endwhile;?>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer(); ?>
