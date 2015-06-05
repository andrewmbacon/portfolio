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
	if(windowH>=bodyH){
		$('body').addClass('stickyfooter');
	}
}




$(document).ready(function(){
	stickyFooter();
});
$(window).resize(function() {
	stickyFooter();
});
$(window).load(function() {
	stickyFooter();
});



})