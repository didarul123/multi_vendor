

// // Mouse Over
//  $('.AllCategory').mouseover(function() {
//     $('.MegaMenuSection').css('display', 'block');
//  });


//  // Mouse leave
// $(".MegaMenuSection").mouseleave(function(){
//   $(".MegaMenuSection").css({"display": "none", "margin-top": "10px"});
// });


// New mega menu
// ==============

$(document).ready(function() {
  // executes when HTML-Document is loaded and DOM is ready
 
 // breakpoint and up  
 $(window).resize(function(){
   if ($(window).width() >= 980){	
 
       // when you hover a toggle show its dropdown menu
       $(".navbar .dropdown-toggle").hover(function () {
          $(this).parent().toggleClass("show");
          $(this).parent().find(".dropdown-menu").toggleClass("show"); 
        });
 
         // hide the menu when the mouse leaves the dropdown
       $( ".navbar .dropdown-menu" ).mouseleave(function() {
         $(this).removeClass("show");  
       });
   
     // do something here
   }	
 });  
  
 // document ready  
 });

