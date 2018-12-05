$(document).ready(function() {

	//PRELOADER

	window.onload = function(){
		$("#loader").fadeOut(350,function(){$(this).remove()});
	};

	//VIDEO PLACEHOLDER

	$('img.videoplay').click(function(){
	    var video = '<iframe width="100%" height="315" src="'+ $(this).attr('data-video') +'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
	    $(this).replaceWith(video);
	});

	// SCROLL

	$(document).on('click','a.smooth', function(e){
      e.preventDefault();
      var $link = $(this);
      var anchor = $link.attr('href');
      $('html, body').stop().animate({
        scrollTop: $(anchor).offset().top
      }, 1000);
    });

	//MOUTH SLIDER

	// Call & init
	$(document).ready(function(){
	  $('.ba-slider').each(function(){
	    var cur = $(this);
	    // Adjust the slider
	    var width = cur.width()+'px';
	    cur.find('.resize img').css('width', width);
	    // Bind dragging events
	    drags(cur.find('.handle'), cur.find('.resize'), cur);
	  });
	});

	// Update sliders on resize.
	// Because we all do this: i.imgur.com/YkbaV.gif
	$(window).resize(function(){
	  $('.ba-slider').each(function(){
	    var cur = $(this);
	    var width = cur.width()+'px';
	    cur.find('.resize img').css('width', width);
	  });
	});

	function drags(dragElement, resizeElement, container) {

	  // Initialize the dragging event on mousedown.
	  dragElement.on('mousedown touchstart', function(e) {

	    dragElement.addClass('draggable');
	    resizeElement.addClass('resizable');

	    // Check if it's a mouse or touch event and pass along the correct value
	    var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

	    // Get the initial position
	    var dragWidth = dragElement.outerWidth(),
	        posX = dragElement.offset().left + dragWidth - startX,
	        containerOffset = container.offset().left,
	        containerWidth = container.outerWidth();

	    // Set limits
	    minLeft = containerOffset + 10;
	    maxLeft = containerOffset + containerWidth - dragWidth - 10;

	    // Calculate the dragging distance on mousemove.
	    dragElement.parents().on("mousemove touchmove", function(e) {

	      // Check if it's a mouse or touch event and pass along the correct value
	      var moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

	      leftValue = moveX + posX - dragWidth;

	      // Prevent going off limits
	      if ( leftValue < minLeft) {
	        leftValue = minLeft;
	      } else if (leftValue > maxLeft) {
	        leftValue = maxLeft;
	      }

	      // Translate the handle's left value to masked divs width.
	      widthValue = (leftValue + dragWidth/2 - containerOffset)*100/containerWidth+'%';

	      // Set the new values for the slider and the handle.
	      // Bind mouseup events to stop dragging.
	      $('.draggable').css('left', widthValue).on('mouseup touchend touchcancel', function () {
	        $(this).removeClass('draggable');
	        resizeElement.removeClass('resizable');
	      });
	      $('.resizable').css('width', widthValue);
	    }).on('mouseup touchend touchcancel', function(){
	      dragElement.removeClass('draggable');
	      resizeElement.removeClass('resizable');
	    });
	    e.preventDefault();
	  }).on('mouseup touchend touchcancel', function(e){
	    dragElement.removeClass('draggable');
	    resizeElement.removeClass('resizable');
	  });
	}

	//CHANGING TEXT OF BUTTON
	$("#e2ma_signup_submit_button").prop('value','Claim your FREE Sleep Therapy Consultation');


});
