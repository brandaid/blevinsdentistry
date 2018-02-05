jQuery(document).ready(function() {
  // Snuggle bar toggle
  jQuery('#open-box').click(function(){
    if (jQuery('#popout').hasClass('open') != true){
      jQuery('#popout').animate({left: '+=900'}, 900, function() {
        jQuery('#popout').toggleClass('open');
      });
	} else {
      jQuery('#popout').animate({left: '-=900'}, 900, function() {
        jQuery('#popout').removeClass('open');
      });
    }
  });
  // Snuggle bar close button
  jQuery('#close-box').click(function(){
    jQuery('#popout').animate({left: '-=900'}, 900, function() {
      jQuery('#popout').removeClass('open');
    });
  });
});