/* ========================================================================= */
/* BE SURE TO COMMENT CODE/IDENTIFY PER PLUGIN CALL */
/* ========================================================================= */

jQuery(function($){


    // PARALLAX
/*
    $(document).scroll(function(){
        var nm = $("html").scrollTop();
        var nw = $("body").scrollTop();
        var n = (nm > nw ? nm : nw);

        $('#element').css({
            'webkitTransform' : 'translate3d(0, ' + n + 'px, 0)',
            'MozTransform'    : 'translate3d(0, ' + n + 'px, 0)',
            'msTransform'     : 'translateY('     + n + 'px)',
            'OTransform'      : 'translate3d(0, ' + n + 'px, 0)',
            'transform'       : 'translate3d(0, ' + n + 'px, 0)',
        });

        // if transform3d isn't available, use top over background-position
        //$('#element').css('top', Math.ceil(n/2) + 'px');

    });    
*/



    /* ====== Twitter API Call ============================================= 
        Note: Script Automatically adds <li> before and after template. Don't forget to setup Auth info in /twitter/index.php */
    /*
    $('#tweets-loading').tweet({       
        modpath: '/path/to/twitter/', // only needed if twitter folder is not in root
        username: 'jackrabbits',
        count: 1,
		template: '<p>{text}</p><p class="tweetlink">{time}</p>' 
	});
    */
	_mobilemenu();
	_portfolioFilter();
	_portfolioPopUp();

	if(window.location.hash) {
		var hash = window.location.hash.substring(1);
			$('#portfolio-items li.mix a#'+hash).trigger('click');
		} else {

	}

});

function _mobilemenu(){
	var menubox 	= $('#mobile-menu-wrap');//main menu wrap
	var menu_btn	= $("#toggle_menu_btn"); // menu btn
	
	// toggle menu arrow 
	var dropDownicon	= 	"icon-arrow-head-up";
	var dropUpicon		= 	"icon-arrow-head-down";
	var arrowClass		=	dropDownicon+" dropdwn-btn";
	
	function hidesub_menu(){
		$('#mobile-nav ul li').each(function() {
			$(this).children( "ul" ).show().addClass("active-submenu");
			$(this).children( "span" ).addClass(dropUpicon).removeClass(dropDownicon);
		});
	}	
	
	menu_btn.click(function(e){ 
		$(this).toggleClass("active");
		hidesub_menu();
		e.stopImmediatePropagation();
		menubox.slideToggle();
		menubox.toggleClass('opened');
	});
	
	menubox.click(function(e){
		e.stopImmediatePropagation();
	});
	
	
	//click inner links
	
	$( "#mobile-nav ul li" ).each(function() {
		$(this).has( "ul" ).addClass( "menu-parent" ).append("<span class='dropdwn-btn'></span>" );
		var sub_menu	=	$(this).children( "ul" );
		$(this).children( 'span' ).click(function(event){
			var current_submenu	=	$(this).parent().children( "ul" );
			var sub_menu		=	$( ".menu-parent ul" );
			$(".dropdwn-btn").addClass(dropDownicon).removeClass(dropUpicon);
			
			if( current_submenu.hasClass("active-submenu") ){
				$(this).removeClass(dropUpicon).addClass(dropDownicon);
				sub_menu.slideUp();
				sub_menu.removeClass("active-submenu");
			} else {
				$(this).removeClass(dropDownicon).addClass(dropUpicon);
				sub_menu.removeClass("active-submenu");
				$(this).parent().children( "ul" ).addClass("active-submenu");
				sub_menu.slideUp();
				current_submenu.slideDown();
			}
		});
		
	});
}


function _portfolioFilter(){
	$('#portfolio-items').mixItUp();
	
	//filter mobile menu
	$('.filter-nav .drop-down-wrap').click(function(){
		$('.filter-nav').toggleClass('open');	
		$('.drop-down-wrap i').toggleClass('icon-arrow-down').toggleClass('icon-arrow-up');
	});
	
	$('.filter-nav li').click(function(){
		var currentItem = $(this).html();
		$('.filter-nav .title').text(currentItem);
		$('.filter-nav').removeClass('open');
		$('.drop-down-wrap i').removeClass('icon-arrow-up').addClass('icon-arrow-down');
	});
}

function _portfolioPopUp(){
	$(".portfolio-popup").colorbox({
		inline:true, 
		width:95+"%",
		maxWidth:970+"px",
		scrolling: false,
		onClosed: function() {
			history.pushState("", document.title, window.location.pathname);
		}
	});
}

function _hashLink(){

}


$(window).resize(function(){
	if( $(window).innerWidth() < 980 ){
		$.colorbox.resize({
			maxWidth:"auto",
			width:95+'%',
		});
	}
	
	if( $(window).innerWidth() > 767 ){
		$("#mobile-menu-wrap").removeAttr("style");
		$("#mobile-nav > ul > li > ul").removeAttr("style");
		$('#toggle_menu_btn').removeClass('active');
	}
});