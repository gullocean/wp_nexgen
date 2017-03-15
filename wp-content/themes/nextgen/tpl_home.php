<?php 
/* Template Name: Template - Home */
get_header();
?>
<section class="australias_prt">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php echo the_field('below_banner_text');?>
				<?php endwhile;?>
			</div>
		</div>
	</div>
	<div class="round_icon">
		<div class="container">
			<div class="row">
				
				<?php 
					  	$i=0;
					  	while( have_rows('below_banner') ): the_row(); ?>

					  <div class="col-sm-3">
					<div class="round_icon_bx">
						<div class="round_icon_bx2Img">
							<a href="<?php echo the_sub_field('link');?>"><img src="<?php echo the_sub_field('image1');?>" alt="" border="0" onmouseover="this.src='<?php echo the_sub_field('image2');?>'" onmouseout="this.src='<?php echo the_sub_field('image1');?>'" /></a>
						</div>
						<a href="<?php echo the_sub_field('link');?>"><?php echo the_sub_field('title');?></a>
					</div>
				</div>
					     <?php $i++; endwhile; ?>
				
			
				
				
			</div>
		</div>
	</div>
</section>

<section class="effective_prt">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col-sm-12">
				<h2><span><?php echo the_field('content1_title');?></span> </h2>
			</div>
			<div class="col-sm-6">
				<div class="effective_prt_para">
				<?php echo the_field('content1_text');?>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="effective_prt_vid">
					<iframe width="100%" height="315" src="<?php echo the_field('content1_youtubelink');?>" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		   <?php endwhile; ?>
	</div>
</section>
<section class="we_partner">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col-sm-12">
				<h2><span>	<?php echo the_field('content2_text');?></span> </h2>
			  <div class="comp_logo">
			  		<?php echo the_field('logoimage');?>
			  </div>
			</div>
		</div>
				<?php endwhile;?>
	</div>
</section> 
<section class="our_clients">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php while ( have_posts() ) : the_post(); ?>
				<h2><span> <?php echo the_field('client_logo_text');?></span></h2>
				<?php endwhile;?>
				<div class="comp_logo2">
				<div id="mycrawler2" class="productswesupport">
					<?php 
					  	$i=0;
					  	while( have_rows('client_logo') ): the_row(); ?>
				    <img src="<?php echo the_sub_field('logo');?>" alt="" />
				     <?php endwhile; ?>
				                           
				</div>
			</div>
				<?php while ( have_posts() ) : the_post(); ?>
			<?php echo the_field('content3_text');?>
			  <?php endwhile;?>
			</div>
			<div class="col-sm-6">
				<div class="effective_prt_vid2">
					<iframe width="100%" height="315" src="<?php echo the_field('content2_youtubelink');?>" frameborder="0" allowfullscreen></iframe>
									
					<div class="our_clients_btn">
						<a href="<?php echo home_url('/contact/'); ?>"> Become one of our clients today </a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="effective_prt_para">
						<?php echo the_field('content2_content');?>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
get_footer(); ?>