/*global $ ,window   */

$(function(){
  'use strict';
	//hide placeholder on form focus
    $('[placeholder]').focus(function () {
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder' , '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('data-text'));
    });
	
  //Adjust Slider Height
      var winH=$(window).height(),
        navH=$('.navbar').innerHeight();
    $('.slider, .carousel-item').height((1/2) * (winH- navH)); 
    //Featured 
    $('.featured-work ul li').click(function(){$(this).addClass('active').siblings().removeClass('active');
      if($(this).data('class') === 'all'){
          $('.shuffle-image .row .col-md').css('opacity','1');
      }
      else{
       $('.shuffle-image .row .col-md').css('opacity','.08');
       $($(this).data('class')).parent().css('opacity','1');
      }
    });
});