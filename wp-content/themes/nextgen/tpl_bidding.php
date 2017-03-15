<?php 
// Template Name: Template - Bidding
get_header();
?>
<script type="text/javascript">
	function nbay_validation(){
		var name = document.forms['nbayform']['name'].value;
		if(name == ""){
			alert("Please Enter your name");
			document.forms['nbayform']['name'].focus();
			return false;
		}
		var userid = document.forms['nbayform']['userid'].value;
		if(userid == ""){
			alert("Please Enter your User ID");
			document.forms['nbayform']['userid'].focus();
			return false;
		}
	}
</script>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="service_body">
	<div class="container">
		<div class="row">
			<div class="service_body_innr">
			<div class="col-sm-12">
					<div class="brd_camp">
						<ul>
							<li><?php the_title(); ?></li>
						</ul>
					</div>
					<p></p>
					<?php
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					if ($image) : ?>
					<img style="max-width: 100%;" src="<?php echo $image[0]; ?>" alt="" />
					<?php endif; ?>
			       
		</div>
					<div class="contact_main_frm nbay_frm">
					<form action="<?php echo get_option('home'); ?>/contact_feedback.php" name="nbayform" method="post" onsubmit="return nbay_validation();"	>
					
					<div class="nbay_top_frm">
					<div class="contact_main_frm_in">
					<label>Name *</label>
					<input type="text" name="name" />
					</div>
					<div class="contact_main_frm_in">
					<label>Department</label>
					<select id="Response36379_588494_1" name="department" class="xForm valid" style="width: auto;">
						<option value="">&nbsp;</option>
						<option value="Nexgen NSW">Nexgen NSW</option>
						<option value="Nexgen QLD">Nexgen QLD</option>
						<option value="Nexgen CBD">Nexgen CBD</option>
						<option value="Business Telecom">Business Telecom</option>
					</select>
					</div>
					<div class="contact_main_frm_in">
					<label>User ID  *</label>
					<input type="text" name="userid" />
					</div>
					<div class="contact_main_frm_in">
					<label><span style="color: #e31e25">Do not press enter before placing your bids</span></label></div>
					</div>
					
					
					
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/Panasonic_TV.jpg" style="width: 100%;" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>Panasonic 65" 4K LCD TV</span></p>
									<p>RRP: <strong>$3500</strong><br />
									Current Bid: <br />
									Reserve:<span>160,000 </span></p>
									<p>Time remaining on Bid<span>- 2 Days</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_panasonic_65" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/Panasonic_TV.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>Panasonic 55" 4K LCD TV</span></p>
									<p>RRP: <strong>$1745</strong><br />
									Current Bid: <br />
									Reserve:<span>110,000 </span></p>
									<p>Time remaining on Bid<span>-2 Days</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_panasonic_55" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/PVR.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>Panasonic PVR with Twin Head Tuners 1TB HDD</span></p>
									<p>RRP: <span>$479</span><br />
									Current Bid:<span> 0</span></p>
									<p><span>Reserve Bid: 75000</span></p>
									<p>Time remaining on Bid-<span> 2 Days</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_panasonic_pvr" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/dell_laptop.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>Dell Y510932AU Inspiron 15" 3000 Laptop</span></p>
									<p>RRP: <span>$449</span><br />
									Current Bid: <span>0</span><br />
									Reserve:<span>70,000 </span></p>
									<p>Time remaining on Bid<span>- 2 Days</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_dell_inspiron" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://www.nexgen.com.au/uploads/74292/ufiles/travel_voucher.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$500 Travel Voucher</span></p>
									<p>RRP: <span>$500</span><br />
									Current Bid:<br />
									Reserve:<strong>75</strong><span>000 </span></p>
									<p>Last Winning Bid <strong><br />
									</strong>Time remaining on Bid<span>- 2 Days</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text"  name="bid_for_500_travel_voucher" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/wireless_multiroom_speaker.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>Panasonic Wireless Speaker with Wifi</span></p>
									<p>RRP: <span>$479</span><br />
									Current Bid:<span> <br />
									Reserve: 70,000 </span></p>
									<p>Time remaining on Bid-<span> 2 Days</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text"  name="bid_for_panasonic_wifi_speaker" />
								</div>
							</div>
						</div>
					</div>
					
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/camera.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>Panasonic Lumix Camera</span></p>
									<p><span>20MP High Resolution CCD </span></p>
									<p>RRP: <span>$349</span><br />
									Current Bid:<span> </span></p>
									<p><strong>Reserve: 60,000<br />
									</strong>Time remaining on Bid-<span>3 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text"  name="bid_for_panasonic_lumix_camera" />
								</div>
							</div>
						</div>
					</div>
					
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/myer_card.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$100 Myer Gift Card</span></p>
									<p>RRP: <span>$100</span><br />
									Current Bid:4<span>5,000</span><br />
									Reserve:<span>30,000 </span></p>
									<p>Time remaining on Bid<span>- 2 Days</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text"  name="bid_for_100_myer_gift_card" />
								</div>
							</div>
						</div>
					</div>
					
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/myer_card.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$50 Myer Gift Card</span></p>
									<p>RRP: <span>$50</span><br />
									Current Bid:<span>16,000</span><br />
									Reserve:<span>16000 </span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_50_myer_gift_card" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/myer_card.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$50 Myer Gift Card</span></p>
									<p>RRP: <span>$50</span><br />
									Current Bid:<span>16,000</span><br />
									Reserve:<span>16000 </span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_50_myer_gift_card_2" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/movies.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$50 Movies Gift Card</span></p>
									<p>RRP: <strong>$50</strong><br />
									Current Bid:<strong>16,000</strong><br />
									Reserve:<span>16000 </span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_50_movie_gift_card" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/myer_card.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$50 Myer Gift Card</span></p>
									<p>RRP: <strong>$50</strong><br />
									Current Bid:<span>18,000</span><br />
									Reserve:<span>16000 </span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_50_myer_gift_card_3" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/movies.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$50 Movies Gift Card</span></p>
									<p>RRP: <strong>$50</strong><br />
									Current Bid:<strong>16,000</strong><br />
									Reserve:<span>16000 </span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_50_movie_gift_card_2" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/movies.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$50 Movies Gift Card</span></p>
									<p>RRP: <strong>$50</strong><br />
									Current Bid:<strong>16,000</strong><br />
									Reserve:<span>16000 </span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_50_movie_gift_card_3" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/movies.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$50 Movies Gift Card</span></p>
									<p>RRP: <strong>$50</strong><br />
									Current Bid:<strong>16,000</strong><br />
									Reserve:<span>16000 </span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_50_movie_gift_card_4" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/myer_card.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$20 Myer Gift Card</span></p>
									<p>RRP: <strong>$20</strong><br />
									Current Bid:<span></span><br />
									Reserve:<span>12000 </span></p>
									<p>Last Winning Bid <span>N/A</span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_20_myer_gift_card_4" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/myer_card.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$20 Myer Gift Card</span></p>
									<p>RRP: <strong>$20</strong><br />
									Current Bid:<span></span><br />
									Reserve:<span>12000 </span></p>
									<p>Last Winning Bid <span>N/A</span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_20_myer_gift_card_4" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/myer_card.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$20 Myer Gift Card</span></p>
									<p>RRP: <strong>$20</strong><br />
									Current Bid:<span></span><br />
									Reserve:<span>12000 </span></p>
									<p>Last Winning Bid <span>N/A</span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_20_myer_gift_card_5" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/myer_card.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$20 Myer Gift Card</span></p>
									<p>RRP: <strong>$20</strong><br />
									Current Bid:<span>12,000</span><br />
									Reserve:<span>12000 </span></p>
									<p>Last Winning Bid <span>N/A</span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_20_myer_gift_card_6" />
								</div>
							</div>
						</div>
					</div>
					<div class="row nbay_row">
						<div class="col-sm-4 nbay_img">
							<img src="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/myer_card.jpg" />
						</div>
						<div class="col-sm-8 nbay_cont">
							<div class="row">
								<div class="col-sm-6">
									<p><span>$20 Myer Gift Card</span></p>
									<p>RRP: <strong>$20</strong><br />
									Current Bid:<span>0</span><br />
									Reserve:<span>12000 </span></p>
									<p>Last Winning Bid <span>N/A</span></p>
									<p>Time remaining on Bid<span>- 2 Day</span></p>
								</div>
								<div class="col-sm-6 nbay_btn">
									<label>Bid</label>
									<input type="text" name="bid_for_20_myer_gift_card_7" />
								</div>
							</div>
						</div>
					</div>
					<p><span><a href="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/points2.pdf">How do I earn points?</a>&nbsp;&nbsp;&nbsp; <a href="http://103.15.156.8/~nexgen/wp-content/uploads/2015/12/Terms_and_Conditions4.pdf">Terms and Conditions</a></span></p>
					<input type="submit" value="Submit" />
					</form>
					</div>
					</div>
				   </div>
				</div>
</section>


<?php endwhile; ?>



<?php get_footer(); ?>