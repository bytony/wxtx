function lavaLamp(){		

	// Lavalamp 
	$(".menu-container").lavaLamp({
		fx: "easeOutExpo", 
		speed: 550,
		click: function(event, menuItem) {
			return true;
		}
	});	
	//dropdown function
	$("#main_menu li").hover(function () {
		$(this).children("ul").css({
			visibility: "visible",
			display: "none"
		}).fadeIn("normal")
	}, function () {
		$("ul", this).css({
			visibility: "hidden"
		})
	});		
	
	//dropdown hover function
	$("ul#main_menu li ul li").find("a").hover(function () {
		$(this).animate({
			paddingLeft: "20"
		}, 200)
	}, function () {
		$(this).animate({
			paddingLeft: "16"
		}, 200)
	})
}

function slider(){		
		
	//3d slider
	$("#mobile_carousel").featureCarousel({
		smallFeatureOffset : 35,
		carouselSpeed : 600,
		autoPlay : 4000
	});
	
	//banner_rotator
	$("#banner_rotator").cycle({ 		// GIVE A UNIQUE ID FOR PROJECT SNAPS SLIDESHOW HERE
		fx: "fade",					// choose amongst 28 transitions : http://jquery.malsup.com/cycle/browser.html
		speed: 600, 					//speed of the transition between the slides
		timeout: 4000 					// interval before the slide changes
	});			
}

function pageTab(){		
	//Page tabs
	var tabContainers = $("div.tabs > div");
	tabContainers.hide().filter(":first").show();
	
	$("div.tabs ul.tabnavigation a").click(function () {
		tabContainers.fadeOut("fast");
		tabContainers.filter(this.hash).slideDown();
		$("div.tabs ul.tabnavigation a").removeClass("selected");
		$(this).addClass("selected");
		return false;
	}).filter(":first").click();
	
	$("div.tabs ul.tabnavigation a").click(function(){$("html,body").animate({scrollTop:555},"slow");});
}

function video(){		
	//video
	$("#video_area").cycle({ 		// GIVE A UNIQUE ID FOR PROJECT SNAPS SLIDESHOW HERE
		fx: "curtainY",					// choose amongst 28 transitions : http://jquery.malsup.com/cycle/browser.html
		speed: 600, 					//speed of the transition between the slides
					// interval before the slide changes
		pager:".video_pager"
	});		

	$("#video_area").cycle("pause");
}

function jcarouselHorizontal(){
	// jcarousel horizontal (Partners/Clients)
	function mycarousel_initCallback(carousel)
	{
		// Disable autoscrolling if the user clicks the prev or next button.
		carousel.buttonNext.bind("click", function() {
			carousel.startAuto(0);
		});
	
		carousel.buttonPrev.bind("click", function() {
			carousel.startAuto(0);
		});
	
		// Pause autoscrolling if the user moves with the cursor over the clip.
		carousel.clip.hover(function() {
			carousel.stopAuto();
		}, function() {
			carousel.startAuto();
		});
	};
	
	$("#mycarousel_horizontal").jcarousel({
		auto: 3,
		wrap: "last",
		scroll: 1,
		initCallback: mycarousel_initCallback
	});
}
	
function jcarouselVertical(){		
	//jCarousel		    
	$("#mycarousel").jcarousel({
		vertical: true,
		scroll: 2
	});
}

//User Review
function jqueryCycle(){		
	
	$("#testimonials_slider").cycle({ 		// GIVE A UNIQUE ID FOR PROJECT SNAPS SLIDESHOW HERE
		fx: "fade",					// choose amongst 28 transitions : http://jquery.malsup.com/cycle/browser.html
		speed: 500, 					//speed of the transition between the slides
		timeout: 3800 					// interval before the slide changes
	});			
}

//back2top
function back2top(){		
	$("#goto_top").hide().removeAttr("href");
	
	if ($(window).scrollTop() != "0") {
		$("#goto_top").fadeIn("slow")
	}
	
	$(window).scroll(function() {
		if ($(window).scrollTop() == "0") {
			$("#goto_top").fadeOut("slow")
		} else {
			$("#goto_top").fadeIn("slow")
		}
	});
	
	$("#goto_top").click(function() {
		$("html, body").animate({
			scrollTop: 0
		}, "slow")
	})
}

//social media icon
function socialIcon(){		
	$(".social_link").hover(function(){
		$(this).animate({marginTop:"-5px"},"fast");
	},
	function()
	{
		$(this).animate({marginTop:"0px"},"fast");}
	
	);
}

//validatation
function contactValidate(){
	$("#commentForm").validate();
}







