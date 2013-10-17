// Spinner

jQuery(document).ready(function(){
	
	jQuery('.spinnerbg').click(function() {
		jQuery('.spinnerbg').hide();
	});
	
	jQuery('#spinner').click(function() {
		jQuery('.spinnerbg').hide();
	});
		
	jQuery('.spinnerbg').css('height', jQuery(window).height() + 67 + 'px');
	jQuery('.spinnerbg').css('width', jQuery(window).width()+10 +'px');
	
	jQuery('#spinner').css('top', (jQuery(window).height()/2)-20+'px');
	jQuery('#spinner').css('left', (jQuery(window).width()/2)-20+'px');
});