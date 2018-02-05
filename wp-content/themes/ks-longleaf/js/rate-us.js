jQuery("#rateCont").hover(
    function (){
        jQuery(this).find('.rateLinksCont').css({'display':'block'}).fadeIn("slow");},
    function (){
        jQuery(this).find('.rateLinksCont').css({'display':'none'});}
);

jQuery('#star').raty({
  click: function(score) {
    if(score == 1)
    {	 
         window.open('http://www.killershark.me/dev/babylon/submit-feedback','_self');	
    }
    if(score == 2)
    {
         window.open('http://www.killershark.me/dev/babylon/submit-feedback','_self');		
    }
    
    if(score == 3)
    {
         window.open('http://www.killershark.me/dev/babylon/submit-feedback','_self');		
    }
    if(score == 4)
    {
        window.open('http://www.killershark.me/dev/babylon/review-us-online','_self'); 
    }
    
    if(score == 5)
    {
        window.open('http://www.killershark.me/dev/babylon/review-us-online','_self');	
    }
  }
});