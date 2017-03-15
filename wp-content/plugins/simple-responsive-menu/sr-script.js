var ww = document.body.clientWidth;
jQuery(document).ready(function() {
	jQuery(".nav-menu-srm li a").each(function() {
		if (jQuery(this).next().length > 0) {
			//jQuery(this).addClass("parent");
			jQuery(this).parent("li").addClass("plus");			var span = jQuery('<a />').attr({'class':'parent' }).html('Arrow');			jQuery(this).parent("li").append(span);
		};
		
	});
	
	jQuery(".nav-menu-srm li").each(function() {
		
		if(jQuery(this).hasClass("current-menu-ancestor")){
						
			jQuery(this).addClass("hover");
			jQuery(this).removeClass("plus");
			jQuery(this).addClass("minus");
			
		}
	});
		
	jQuery(".srm-menu-toggle").click(function(e) {
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".nav-menu-srm").toggle();
	});
	adjustMenu();
})

jQuery(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 768) { 
		/*jQuery(".menu-toggle").css("display", "block");
		if (!jQuery(".menu-toggle").hasClass("active")) {
			jQuery(".nav-menu-srm").hide('slow');
		} else {
			jQuery(".nav-menu-srm").show('slow');
		}*/
		jQuery(".nav-menu-srm li").unbind('mouseenter mouseleave');
		jQuery(".nav-menu-srm li a.parent").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			e.preventDefault();
			//jQuery(this).parent("li").toggleClass("hover");
			jQuery(this).parent("li").toggleClass("hover");
			
			if(jQuery(this).parent("li").hasClass("hover")){
				
					jQuery(this).parent("li").removeClass("unhover");
				    jQuery(this).parent("li").addClass("hover");
					jQuery(this).parent("li").removeClass("plus");
					jQuery(this).parent("li").addClass("minus");
				
				}else{
					
					jQuery(this).parent("li").removeClass("hover");
				    jQuery(this).parent("li").addClass("unhover");
					jQuery(this).parent("li").addClass("plus");
					jQuery(this).parent("li").removeClass("minus");
					
					}
			
				
		});
	} 
	else if (ww >= 768) {
		jQuery(".sr-toggleMenu").css("display", "none");
		jQuery(".nav-menu-srm").show('slow');
		jQuery(".nav-menu-srm li").removeClass("hover");
		jQuery(".nav-menu-srm li a").unbind('click');
		jQuery(".nav-menu-srm li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	jQuery(this).toggleClass('hover');
		});
	}
}
