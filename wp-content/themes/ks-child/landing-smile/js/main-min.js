$(document).ready(function(){function t(l,s,u){
// Initialize the dragging event on mousedown.
l.on("mousedown touchstart",function(e){l.addClass("draggable"),s.addClass("resizable");
// Check if it's a mouse or touch event and pass along the correct value
var a=e.pageX?e.pageX:e.originalEvent.touches[0].pageX,t=l.outerWidth(),i=l.offset().left+t-a,o=u.offset().left,n=u.outerWidth();
// Get the initial position
// Set limits
minLeft=o+10,maxLeft=o+n-t-10,
// Calculate the dragging distance on mousemove.
l.parents().on("mousemove touchmove",function(e){
// Check if it's a mouse or touch event and pass along the correct value
var a=e.pageX?e.pageX:e.originalEvent.touches[0].pageX;leftValue=a+i-t,
// Prevent going off limits
leftValue<minLeft?leftValue=minLeft:leftValue>maxLeft&&(leftValue=maxLeft),
// Translate the handle's left value to masked divs width.
widthValue=100*(leftValue+t/2-o)/n+"%",
// Set the new values for the slider and the handle. 
// Bind mouseup events to stop dragging.
$(".draggable").css("left",widthValue).on("mouseup touchend touchcancel",function(){$(this).removeClass("draggable"),s.removeClass("resizable")}),$(".resizable").css("width",widthValue)}).on("mouseup touchend touchcancel",function(){l.removeClass("draggable"),s.removeClass("resizable")}),e.preventDefault()}).on("mouseup touchend touchcancel",function(e){l.removeClass("draggable"),s.removeClass("resizable")})}
//CHANGING TEXT OF BUTTON
//PRELOADER
window.onload=function(){$("#loader").fadeOut(350,function(){$(this).remove()})},
//VIDEO PLACEHOLDER
$("img.videoplay").click(function(){var e='<iframe width="100%" height="315" src="'+$(this).attr("data-video")+'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';$(this).replaceWith(e)}),
//MOUTH SLIDER
// Call & init
$(document).ready(function(){$(".ba-slider").each(function(){var e=$(this),a=e.width()+"px";
// Adjust the slider
e.find(".resize img").css("width",a),
// Bind dragging events
t(e.find(".handle"),e.find(".resize"),e)})}),
// Update sliders on resize. 
// Because we all do this: i.imgur.com/YkbaV.gif
$(window).resize(function(){$(".ba-slider").each(function(){var e=$(this),a=e.width()+"px";e.find(".resize img").css("width",a)})}),$("#e2ma_signup_submit_button").prop("value","Claim your FREE Toothbrush & Design Consultation")});