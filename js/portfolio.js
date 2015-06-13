jQuery(document).ready(function($) {

// STICKY FOOTER
// measures height of the page, and applies a class to absolute position the footer, or not. 
// on short pages, it sticks; on tall pages, it doesn't. 

function stickyFooter(){
	console.log('stickyfooter...');
	$('body').removeClass('sticky');
	var bodyH = $('body').outerHeight();
	//var footerH = $('#footer').outerHeight();
	var windowH = window.innerHeight;
	console.log(windowH);
	console.log(bodyH);
	
	if(windowH>=bodyH){
		$('body').addClass('stickyfooter');
	}
	$('#footer').attr('style', 'visibility:visible;');
}



$('.contact-button a').html('<span class="btn btn-sm btn-primary">Contact</span>').addClass('poop');



$(document).ready(function(){
	//stickyFooter();
});
$(window).resize(function() {
	stickyFooter();
});
$(window).load(function() {
	stickyFooter();
});



})