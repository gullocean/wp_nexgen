var wizard = jQuery("#internal_form_container");

jQuery(".body_top_form").on('click', '#show_internal_form_overlay', function(){
	jQuery("#internal_form_overlay").fadeIn(300);
});

jQuery('#internal_form_box').on('click', function(e) {
	e.stopPropagation();
});

jQuery("body").on('click', '#internal_form_overlay', function(){
	jQuery("#internal_form_overlay").fadeOut(300);
});

jQuery("#internal_form_container").steps({
	titleTemplate: '<span class="number step_#index#"></span>',
	transitionEffect: 'fade',
	transitionEffectSpeed: 300,
	enableConfirmButton: true,
	labels: {
		current: "",
		finish: "Submit",
		previous: "",
	},
	onStepChanging: function (event, currentIndex, newIndex){
		// Allways allow previous action even if the current form is not valid!
		if (currentIndex > newIndex)
		{
			return true;
		}

		// Allow to go next only if button is not disabled
		if (currentIndex != 1){
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
		wizard.find("div[id^=internal_form_container-p]").on('change', "input[type=text]", function(){
			var input = jQuery(this);
			var name = input.attr('name');
			var val = input.val();
			var valid = true;

			if( val.length === 0 ){
				valid = false;
			} else {
				switch( name ){
					case 'phone_number':
						// var regex = '^(\([0-9]{3}\)\s*|[0-9]{3}\-|[0-9]{3}\s)[0-9]{3}((\s|\-){1})?[0-9]{4}$';
						var regex = '^(?=.*[0-9])[- +()0-9]+$';
						if( ! val.match(regex) ){
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
		wizard.find("#internal_form_container-p-1").on('change', "input[type=text]", function(){
			var phone_number = wizard.find("#internal_form_container-p-1 input[type=text]#phone_number").val();
			var next = wizard.find(".actions a.Confirm[href$='#next']").parent();
			var enabled = true;

			wizard.find("#internal_form_container-p-1 input[type=text]").each(function() {
				if( jQuery(this).val().length === 0 || jQuery(this).hasClass('novalid')  ){
					enabled = false;
				}
			});

			if( enabled ){
				next.addClass('enabled').removeClass('disabled')._aria('disabled', 'false');
			} else {
				next.removeClass('enabled').addClass('disabled')._aria('disabled', 'true');
			}
		});
		// Third step cofirm button enable/disable (on checkboxes change)
		wizard.find("#internal_form_container-p-2").on('click', "input[type=checkbox]", function(){
			var checked = wizard.find("#internal_form_container-p-2 input[type=checkbox]:checked");
			var val = wizard.find("#internal_form_container-p-2 input[type=text]#enquiry_reasons_others").val();

			var next = wizard.find(".actions a.Next[href$='#next']").parent();

			if(checked.length > 0 || val.length > 0){
				next.addClass('enabled').removeClass('disabled')._aria('disabled', 'false');
			} else {
				next.removeClass('enabled').addClass('disabled')._aria('disabled', 'true');
			}
		});
		// Third step cofirm button enable/disable (on Others text input change)
		wizard.find("#internal_form_container-p-2").on('change', "input[type=text]#enquiry_reasons_others", function(){
			var checked = wizard.find("#internal_form_container-p-2 input[type=checkbox]:checked");
			var val = wizard.find("#internal_form_container-p-2 input[type=text]#enquiry_reasons_others").val();

			var next = wizard.find(".actions a.Next[href$='#next']").parent();

			if(checked.length > 0 || val.length > 0){
				next.addClass('enabled').removeClass('disabled')._aria('disabled', 'false');
			} else {
				next.removeClass('enabled').addClass('disabled')._aria('disabled', 'true');
			}
		});
		// Fourth step cofirm button enable/disable
		wizard.find("#internal_form_container-p-3").on('change', "input[type=text]", function(){
			var finish = wizard.find(".actions a[href$='#finish']").parent();
			var enabled = true;

			wizard.find("#internal_form_container-p-3 input[type=text]").each(function() {
				if( jQuery(this).val().length === 0 || jQuery(this).hasClass('novalid')  ){
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
		jQuery("#internal_form_table").css('max-width', ( jQuery(window).width() * 0.95 ) );
		jQuery(window).on('resize', function(){
			jQuery("#internal_form_table").css('max-width', ( jQuery(this).width() * 0.95 ) );
		});

		// First step next button enable/disable
		wizard.find("#internal_form_container-p-0").on('click', "input[type=checkbox]", function(){
			var checked = wizard.find("#internal_form_container-p-0 input[type=checkbox]:checked");
			var next = wizard.find(".actions a.Next[href$='#next']").parent();

			if(checked.length > 0){
				next.addClass('enabled').removeClass('disabled')._aria('disabled', 'false');
			} else {
				next.removeClass('enabled').addClass('disabled')._aria('disabled', 'true');
			}
		});
	},
	onFinishing: function (event, currentIndex)
	{
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

		var data = {
			action:					'nexgen_quote_form',
			source:					'front-page-form',
			first_name:				wizard.find('input#first_name').val(),
			last_name:				wizard.find('input#last_name').val(),
			phone_number:			wizard.find('input#phone_number').val(),
			postcode:				wizard.find('input#postcode').val(),
			busines_name:			wizard.find('input#busines_name').val(),
			busines_phone_handsets:	wizard.find('input#busines_phone_handsets').val(),
			busines_email:			wizard.find('input#busines_email').val(),
			enquiry_reasons_others:	wizard.find('input#enquiry_reasons_others').val(),
			newsletter:				wizard.find('input#newsletter').is(':checked'),
			nonce:					ajax_var.nonce
		};

		wizard.find("div[id^=internal_form_container-p] input[type=checkbox]:checked").each(function() {
			var name = jQuery(this).attr('name');
			data[name] = true;
		});

		jQuery.ajax({
			method: 'POST',
			async: false,
			url: ajax_var.ajaxurl,
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
			jQuery("#internal_form_finish").fadeIn(300);
			// jQuery("#internal_form_overlay").delay(3600).fadeOut(300);
		});
		setTimeout(function() {
			jQuery(location).attr('href', 'http://nexgen.com.au/thank-you/');
		}, 5600);
	}
});