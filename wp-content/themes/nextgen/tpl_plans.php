<?php 
// Template Name: Template - Plans New
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
					<p></p>
					<?php the_content(); ?>

<h4>Voice Plans & 1300</h4><br>

					<div class="from_price">
												
						<div class="from_price_bx">
							<h2>Voice PAYG*</h2>
							<div class="from_price_bx_btm color1">
								<h3>FROM</h3>
<h4>$13*p/mo</h4>
<div class="red_anc3"><a href="http://nexgen.com.au/contact/">Enquire now</a></div>
<div class="red_anc3"> </div>
<div class="red_anc3">*Min 6 Lines</div>
							</div>
						</div>

	<div class="from_price_bx">
							<h2>Voice Unlimited*</h2>
							<div class="from_price_bx_btm">
								<h3>FROM</h3>
<h4>$24.50*p/mo</h4>
<div class="red_anc3"><a href="http://nexgen.com.au/contact/">Enquire now</a></div>
<div class="red_anc3"> </div>
<div class="red_anc3">*Min 4 channels + IP Midband</div>
							</div>
						</div>
<div class="from_price_bx">
							<h2>PAYG 1300s</h2>
							<div class="from_price_bx_btm color1">
								<h3>FROM</h3>
<h4>$0*p/month</h4>
<div class="red_anc3"><a href="http://nexgen.com.au/contact/">Enquire now<br /></a><br />*Conditions apply&nbsp;&nbsp;</div>
							</div>
						</div>
<div>

<div class="from_price_bx">
							<h2>Voice Plans & 1300</h2>
							<div class="from_price_bx_btm color1">
								<h3>FROM</h3>
<h4>$27.50*p/month</h4>
<div class="red_anc3"><a href="http://nexgen.com.au/contact/">Enquire now<br /></a><br />*500MB & $250 call plan</div>
							</div>
						</div>

<h4>Internet Plans</h4><br>

<div class="from_price_bx">
							<h2>ADSL 2+ Unlimited</h2>
							<div class="from_price_bx_btm">
								<h3>FROM</h3>
<h4>$54.50*p/month</h4>
<div class="red_anc3"><a href="http://nexgen.com.au/contact/">Enquire now<br /></a><br />*Speed 24/1</div>




							</div>
						</div>

<div class="from_price_bx">
							<h2>Midband Unlimited</h2>
							<div class="from_price_bx_btm color1">
								<h3>FROM</h3>
<h4>$249.50*p/month</h4>
<div class="red_anc3"><a href="http://nexgen.com.au/contact/">Enquire now<br /></a><br />*Speed 10/10</div>





							</div>
						</div>

<div class="from_price_bx">
							<h2>Fibre Unlimited</h2>
							<div class="from_price_bx_btm">
								<h3>FROM</h3>
<h4>$379*p/month</h4>
<div class="red_anc3"><a href="http://nexgen.com.au/contact/">Enquire now<br /></a><br />*Speed 400/400</div>




							</div>
						</div>

<div class="from_price_bx">
							<h2>NBN</h2>
							<div class="from_price_bx_btm">
								<h3>FROM</h3>
<h4>$69*p/month</h4>
<div class="red_anc3"><a href="http://nexgen.com.au/contact/">Enquire now<br /></a><br />*Speed 25/5</div>




							</div>
						</div>



						
						
					</div>
					
					
					</div>
				</div>
				<div class="col-sm-3">
				<div class="service_body_innr2">
					<?php dynamic_sidebar ('sidebar-widget-area'); ?>
				</div>
			</div>
				</div>				<div class="row">			<div class="col-sm-12">				<div class="make_the_switch_main">				<div class="make_the_switch">					<?php dynamic_sidebar ('footer-box-widget-area'); ?>									</div>				</div>			</div>		</div>
				</div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>