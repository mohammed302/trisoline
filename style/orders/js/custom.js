/*global $, alert, console */

$(document).ready(function () {
    "use strict";
    
    // NiceScroll
    
    $("html").niceScroll();
    
    // change Header Height 
    
    $('.header').height($(window).height());
    $('.login').height($(window).height());
    $('.rigi').height($(window).height());
     $('.forg').height($(window).height());
    
    //Scroll Feat
    
    $('.header .arrow i').click(function () {
        
    $('html, body').animate({
        
    scrollTop: $('.feat').offset().top
        
    }, 1000);
    
    });

});