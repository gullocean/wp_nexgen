<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>
			<?php
				global $page, $paged;
				wp_title( '|', true, 'right' );
				bloginfo( 'name' );
			?>
		</title>
		<link href="<?php echo get_template_directory_uri();?>/css/form-full-page.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
		<script src="<?php echo home_url( '' ); ?>/wp-includes/js/jquery/jquery.js"></script>
		<script src="<?php echo get_template_directory_uri();?>/js/jquery.steps.js"></script>
	</head>
	<body <?php body_class(); ?>>
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
		<div id="form_left">
			<div id="form">
				<div id="form_container">
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
				<div id="form_finish" style="display: none;">
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
		<div id="form_img">
			<a href="<?php if( $_SERVER["HTTP_REFERER"] != null ){ echo $_SERVER["HTTP_REFERER"]; } else { echo home_url('/'); } ?>">
				<div id="close_button"></div>
			</a>
			<div id="logo"></div>
		</div>
		<script>
			var wizard = jQuery("#form_container");

			jQuery("#form_container").steps({
				titleTemplate: '<span class="number step_#index#"></span>',
				transitionEffect: 'fade',
				transitionEffectSpeed: 300,
				enableConfirmButton: true,
				labels: {
					current: "",
					finish: "Submit",
					previous: "Back",
				},
				onStepChanging: function (event, currentIndex, newIndex){

					// Allways allow previous action even if the current form is not valid!
					if (currentIndex > newIndex)
					{
						return true;
					}

					// Allow to go next only if button is not disabled
					if (currentIndex == 0){
						var next = wizard.find(".actions a.Next[href$='#next']").parent();

						if( next.attr("aria-disabled") == 'true' ){
							return false;
						} else {
							return true;
						}
					}
					if (currentIndex == 1){
						var next = wizard.find(".actions a.Confirm[href$='#next']").parent();
						if( next.attr("aria-disabled") == 'true' ){
							return false;
						} else {
							return true;
						}
					}
				},
				onStepChanged: function (event, currentIndex, newIndex){
					// validation
					wizard.find("div[id^=form_container-p]").on('change', "input[type=text]", function(){
						var input = jQuery(this);
						var name = input.attr('name');
						var val = input.val();
						var valid = true;

						if( val.length === 0 ){
							valid = false;
						} else {
							switch( name ){
								case 'phone_number':
									// var regex = '^(\([0-9]{3}\)\s*|[0-9]{3}\-|[0-9]{3}\s)[0-9]{3}((\s|\-){1})?[0-9]{4}$'; // phone number
									var regex = '^(?=.*[0-9])[- +()0-9]+$';
									if( ! val.match(regex) || val.length < 6 ){
										valid = false;
									}
									break;
								case 'postcode':
									var regex = '^(0[289][0-9]{2})|([1345689][0-9]{3})|(2[0-8][0-9]{2})|(290[0-9])|(291[0-4])|(7[0-4][0-9]{2})|(7[8-9][0-9]{2})$';
									if( ! val.match(regex) ){
										valid = false;
									}
									break;
								case 'busines_phone_handsets':
									var regex = '^(?=.*[0-9])[0-9]+$';
									if( ! val.match(regex) ){
										valid = false;
									}
									break;
								case 'busines_email':
									if( ! val.match(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/) ){
										valid = false;
									}
									break;
								default:
									if( val.length < 2 ){
										valid = false;
									}
							}
						}

						if( valid == false ){
							input.addClass('novalid');
						} else {
							input.removeClass('novalid');
						}
					});
					// Second step cofirm button enable/disable
					wizard.find("#form_container-p-1").on('change', "input[type=text]", function(){
						var phone_number = wizard.find("#form_container-p-1 input[type=text]#phone_number").val();
						var next = wizard.find(".actions a.Confirm[href$='#next']").parent();
						var enabled = true;

						wizard.find("#form_container-p-1 input[type=text]").each(function() {
							if( jQuery(this).val().length === 0 || jQuery(this).hasClass('novalid') ){
								enabled = false;
							}
						});

						if( enabled ){
							next.addClass('enabled').removeClass('disabled')._aria('disabled', 'false');
						} else {
							next.removeClass('enabled').addClass('disabled')._aria('disabled', 'true');
						}
					});
					// Third step cofirm button enable/disable
					wizard.find("#form_container-p-2").on('change', "input[type=text]", function(){
						var finish = wizard.find(".actions a[href$='#finish']").parent();
						var enabled = true;

						wizard.find("#form_container-p-2 input[type=text]").each(function() {
							if( jQuery(this).val().length === 0 || jQuery(this).hasClass('novalid') ){
								enabled = false;
							}
						});

						if( enabled ){
							finish.addClass('enabled').removeClass('disabled')._aria('disabled', 'false');
						} else {
							finish.removeClass('enabled').addClass('disabled')._aria('disabled', 'true');
						}
					});
				},
				onInit: function (event, currentIndex){
					var window_width = jQuery(window).width();
					jQuery("html").css('max-width', window_width );
					jQuery("body").css('max-width', window_width );
					jQuery("#form_left").css('max-width', window_width );

					if( window_width <= 641 ){
						jQuery("#form").css('max-width', ( window_width * 0.9 ) );
					}

					jQuery(window).on('resize', function(){
						var window_width = jQuery(window).width();
						jQuery("html").css('max-width', window_width );
						jQuery("body").css('max-width', window_width );
						jQuery("#form_left").css('max-width', window_width );

						if( window_width <= 641 ){
							jQuery("#form").css('max-width', ( window_width * 0.9 ) );
						}
					});
					// First step next button enable/disable
					wizard.find("#form_container-p-0").on('click', "input[type=checkbox]", function(){
						var checked = wizard.find("#form_container-p-0 input[type=checkbox]:checked");
						var next = wizard.find(".actions a.Next[href$='#next']").parent();

						if(checked.length > 0){
							next.addClass('enabled').removeClass('disabled')._aria('disabled', 'false');
						} else {
							next.removeClass('enabled').addClass('disabled')._aria('disabled', 'true');
						}
					});
					var next = wizard.find(".actions a.Next[href$='#next']").parent();
					// next.addClass('loading');
					// next.append('<img src="<?php echo get_template_directory_uri();?>/images/loader.gif" class="submit_loading" />');
				},
				onFinishing: function (event, currentIndex)
				{
					if (currentIndex == 2){
						var finish = wizard.find(".actions a[href$='#finish']").parent();
						var loading = wizard.find(".actions .submit_loading");

						if( finish.attr("aria-disabled") == 'true' ){
							return false;
						}

						if(loading.length > 0){
							return false;
						} else {
							finish.append('<div class="submit_loading"></div>');
						}
					}

					var data = {
						action:					'nexgen_quote_form',
						source:					'full-page-form',
						first_name:				wizard.find('input#first_name').val(),
						last_name:				wizard.find('input#last_name').val(),
						phone_number:			wizard.find('input#phone_number').val(),
						postcode:				wizard.find('input#postcode').val(),
						busines_name:			wizard.find('input#busines_name').val(),
						busines_phone_handsets:	wizard.find('input#busines_phone_handsets').val(),
						busines_email:			wizard.find('input#busines_email').val(),
						newsletter:				wizard.find('input#newsletter').is(':checked'),
						nonce:					'<?php echo wp_create_nonce( 'nonce_quote_form' ); ?>'
					};

					wizard.find("div[id^=form_container-p] input[type=checkbox]:checked").each(function() {
						var name = jQuery(this).attr('name');
						data[name] = true;
					});

					jQuery.ajax({
						method: 'POST',
						async: false,
						url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
						data: data
					}).done( function( response ){
						console.log(response);
						if (response.status === 200) {
							console.log('return true');
							return true;
							wizard.triggerHandler("finished", [currentIndex]);
						}
						if (response.status === 500) {
							return false;
							console.log(response.msg);
						}
					});

					return true;

				},
				onFinished: function (event, currentIndex)
				{
					wizard.fadeOut(300, function() {
						// jQuery("#form_finish").fadeIn(300);
					});
					setTimeout(function() {
						// jQuery(location).attr('href', 'http://nexgen.com.au/thank-you/');
					}, 5600);
				}
			});
		</script>
	</body>
</html>