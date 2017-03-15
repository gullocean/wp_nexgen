<?php 
// Template Name: Template - contact
get_header();
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="service_body_innr">
					<div class="brd_camp">
						<ul>
							<li><a href="#"><?php the_title(); ?></a></li>
						</ul>
					</div>
					<p></p>
					<?php the_content(); ?>
					<?php 
					$phone = get_field('phone_number');
					?>
					<?php if($phone != ''){ ?>
					<p><strong>Phone:</strong><?php echo $phone; ?></p>
					<?php }?>
	                		
				    
				    
				    <div class="contact_main_frm">
				    	<h3>Enquiry Form</h3>
						<?php echo do_shortcode('[contact-form-7 id="162" title="Contact Page Form"]'); ?>
				</div>
			</div>	
			</div>
			<div class="col-sm-4">
				<div class="service_body_innr2">
					<div class="map_prt">
						<ul>
							<?php 
							$phone = get_field('phone_number');
							$fax = get_field('fax');
							$email_address = get_field('email_address');
							?>
							<?php if($phone != ''){ ?>
							<li><span>Phone: </span><?php echo $phone; ?></li>
							<?php }
							if($fax != ''){ ?>
							<li><span>Fax: </span><?php echo $fax; ?></li>
							<?php }
							if($email_address != ''){ ?>
							<li><span>Email: </span><a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></li>
							<?php } ?>
						</ul>
						
						<?php if( have_rows('add_address_repeater') ): ?>
						<?php while( have_rows('add_address_repeater') ): the_row(); 
							$location = get_sub_field('location');
							$address = get_sub_field('address');	
							$google_map = get_sub_field('google_map');
						?>	
						<div class="map">
							<iframe src="<?php echo $google_map; ?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<ul>
							<li><span><?php echo $location; ?>: </span><?php echo $address; ?></li>

						</ul>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>