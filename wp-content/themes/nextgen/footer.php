<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	<footer class="ftr">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="testim">
					<?php //dynamic_sidebar( 'newsletter-widget-area' ); ?>
					
					<script>
					function xyz_em_verify_fields()
					{
					var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					var address = document.subscription.xyz_em_email.value;
					if(reg.test(address) == false) {
						alert('Please check whether the email is correct.');
					return false;
					}else{
					//document.subscription.submit();
					return true;
					}
					}
					</script>
					<style>
					#tdTop{
						border-top:none;
					}
					</style>
					
					<h4>Subscribe to our Newsletter</h4>
					<div class="news">
						<form method="POST" name="subscription" action="http://sunil8986.com/demo/client/nexgen/index.php?wp_nlm=subscription">
						<input type="text" name="xyz_em_email" value="" placeholder="Enter email here" />
						<input type="submit" name="htmlSubmit" value=""  id="submit_em" class="button-primary" onclick="javascript: if(!xyz_em_verify_fields()) return false; " />
						</form>
					</div>
					
					
					
					
				</div>
			</div>
			<div class="col-sm-7">
				
				<div class="row">
					<div class="col-sm-8">
						<div class="ftr_link_sec">
							<h4>Quicklinks</h4>
							<?php

$defaults = array(
	'theme_location'  => 'footer1',
	'menu'            => '',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => '',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul>%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );


							
							
							
						
$defaults = array(
	'theme_location'  => 'footer2',
	'menu'            => '',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => '',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul>%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );



$defaults = array(
	'theme_location'  => 'footer3',
	'menu'            => '',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => '',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul>%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );

?>
			

			
						</div>
					</div>
					<div class="col-sm-4">
						<div class="ftr_link_sec">
							<?php dynamic_sidebar( 'footer-contact-widget-area' ); ?>
						</div>
					</div>
				</div>
				
				
				
			</div>
			<div class="col-sm-2">
				<div class="ftr_link_sec">
						<?php dynamic_sidebar( 'social-widget-area' ); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="ftr_bottom">
				<?php dynamic_sidebar( 'footer-link-widget-area' ); ?>
				
				</div>
			</div>
		</div>
	
	</div>
</footer>

<div class="modal fade" id="quoteForm" tabindex="-1" role="dialog" aria-labelledby="quoteFormTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo do_shortcode('[wizard id="1"]'); ?>
		</div>
	</div>
</div>


<!-- <div id="internal_form_overlay">
	<div id="internal_form_table">
		<div id="internal_form_table_cell">
			<div id="internal_form_box">
				<?php

					$form_first_step_checboxes = array(
						'business_solution_1' => 'New business phone system',
						'business_solution_2' => 'Upgrade existing phone system',
						'business_solution_3' => 'Printers & copiers',
						'business_solution_4' => 'Security & conferencing',
						'business_solution_5' => 'Internet & phone plans',
						'business_solution_6' => 'Equipment finance'
					);

					$form_second_step_inputs = array(
						'first_name' => 'First name',
						'last_name' => 'Last name',
						'phone_number' => 'Phone number',
						'postcode' => 'Postcode'
					);

					$form_third_step_checboxes = array(
						'enquiry_reasons_1' => 'Expanding business',
						'enquiry_reasons_2' => 'Moving premises',
						'enquiry_reasons_3' => 'Get NBN ready',
						'enquiry_reasons_4' => 'Cost reductioning',
						'enquiry_reasons_5' => 'Transition to PABX od VOIP',
						'enquiry_reasons_6' => 'Upgrading technology',
						'enquiry_reasons_7' => 'Trade-in/Cash-back'
					);

					$form_fourthd_step_inputs = array(
						'busines_name' => 'Business name',
						'busines_phone_handsets' => 'No. phone handsets',
						'busines_email' => 'Email'
					);

				?>
				<div id="internal_form_container">
					<h1>First Step</h1>
					<div>
						<h3>What type of business solution are you looking for?</h3>

						<section id="first" class="section">
							<?php foreach( $form_first_step_checboxes as $name => $text ){ ?>
								<div class="container">
									<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $name; ?>">
									<label for="<?php echo $name; ?>"><span class="checkbox"><?php echo $text; ?></span></label>
								</div>
							<?php } ?>
						</section>
					</div>

					<h1>Second Step</h1>
					<div>
						<h3>Ok - how can we get in touch with you?</h3>

						<section id="first" class="section">
							<?php foreach( $form_second_step_inputs as $name => $text ){ ?>
								<div class="container">
									<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" placeholder="<?php echo $text; ?>">
								</div>
							<?php } ?>
						</section>

					</div>

					<h1>Third Step</h1>
					<div>
						<h3>Thanks - and what is the reason for your enquiry?</h3>

						<section id="first" class="section">
							<?php foreach( $form_third_step_checboxes as $name => $text ){ ?>
								<div class="container">
									<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $name; ?>">
									<label for="<?php echo $name; ?>"><span class="checkbox"><?php echo $text; ?></span></label>
								</div>
							<?php } ?>
								<div class="container">
									<input type="text" name="enquiry_reasons_others" id="enquiry_reasons_others" placeholder="Other">
								</div>
						</section>
					</div>

					<h1>Fourth Step</h1>
					<div>
						<h3>And finally a little about your business.</h3>

						<section id="first" class="section">
							<?php foreach( $form_fourthd_step_inputs as $name => $text ){ ?>
								<div class="container">
									<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" placeholder="<?php echo $text; ?>">
								</div>
							<?php } ?>
								<div class="container newsletter">
									<input type="checkbox" name="newsletter" id="newsletter" checked>
									<label for="newsletter"><span class="checkbox">Opt-in to Nexgen marketing messages.</span></label>
								</div>
						</section>
					</div>
				</div>
				<div id="internal_form_finish" style="display: none;">
					<div class="content">
						<h3>Thank you.</h3>
						<h5>Our experts sales team <br /> will call you shortly.</h5>
						<a href="<?php echo home_url('/'); ?>">
							<img src="<?php echo get_template_directory_uri();?>/images/logo.svg" class="logo" alt="Nexgen" title="Nexgen" />
						</a>
						<ul>
							<li><span>Sydney</span></li>
							<li><span>Melbourne</span></li>
							<li><span>Brisbane</span></li>
						</ul>
						<p class="policy"><a href="<?php echo home_url('/privacy-policy/'); ?>">Privacy Policy</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

<script src="<?php bloginfo('template_url');?>/js/bootstrap.js"></script>
<script src="<?php bloginfo('template_url');?>/js/bootstrap-carousel.js"></script>
<script src="<?php bloginfo('template_url');?>/js/application.js"></script>

<!-- OR -->
<!-- <script src="js/docs.min.js"></script> -->
 
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php bloginfo('template_url');?>/js/ie10-viewport-bug-workaround.js"></script>

<script src="<?php bloginfo('template_url');?>/js/crawler.js" type="text/javascript" ></script>


<script src="<?php bloginfo('template_url');?>/js/doubletaptogo.js"></script>
<script>
	$( function()
	{
		$( '#navbar li:has(ul)' ).doubleTapToGo();
	});
	
	
	
</script>


<script type="text/javascript">
 marqueeInit({
               uniqueid: 'mycrawler2',
               style: {
                         
               },
               inc: 5, //speed - pixel increment for each iteration of this marquee's movement
               mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
               moveatleast: 2, 
               neutral: 150,
               savedirection: true,
               random: true
            });
</script>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
