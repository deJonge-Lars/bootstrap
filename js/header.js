function handleScroll() {
    if (window.pageYOffset > 50) {
        document.getElementById("navigation").classList.remove('navbar-dark', 'py-6');
        document.getElementById("navigation").classList.add('navbar-light', 'bg-white', 'border-bottom', 'py-4');
    } else {
        document.getElementById("navigation").classList.remove('navbar-light', 'bg-white', 'border-bottom', 'py-4');
        document.getElementById("navigation").classList.add('navbar-dark', 'py-6');
    }
}

window.addEventListener("scroll", handleScroll);


// Old Header
//$(document).ready(function() {
//
//  $(window).scroll(function() {
//
//    if ($(window).scrollTop() > 50) {
//      $('header').addClass('scrolled');
//    } else {
//      $('header').removeClass('scrolled');
//    };
//
//    if ($(window).scrollTop() > 50) {
//      $('nav').addClass('smenu');
//    } else {
//      $('nav').removeClass('smenu');
//    };
//    
//    if ($(window).scrollTop() > 50) {
//      $('.logo').addClass('slogo');
//    } else {
//      $('.logo').removeClass('slogo');
//    }; 
//      
//    if ($(window).scrollTop() > 50) {
//      $('.hamburger').addClass('shamburger');
//    } else {
//      $('.hamburger').removeClass('shamburger');
//    }; 
//      
//    if ($(window).scrollTop() > 50) {
//      $('.menu li a').addClass('cmenu');
//    } else {
//      $('.menu li a').removeClass('cmenu');
//    }; 
//      
//  });
//});
//
//
//$(document).ready(function(){
//    $(".hamburger").click(function(){
//        $(".hamburger").toggleClass("closed");
//        $(".menu").toggleClass("show");
//        if($("#header").hasClass("headerbg")){
//          $("#header").removeClass("headerbg");
//        } else {
//          $("#header").addClass("headerbg");
//        }
//    });
//});
//