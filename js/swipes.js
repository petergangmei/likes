$(document).ready(function(){
  setTimeout(function(){
    $('.lpick').fadeOut(500);
   $.when(
    $('.showbox').fadeIn(1000)
    ).then(function(){
    $('.NoMoreItem').css('display', 'block');
    });

  }, 1300);
  $.when(
     setTimeout(function(){ 
    $('.x-btn').css('opacity', '0.3')
      }, 3800)
    
    ).then(function(){
      setTimeout(function(){ 

        $('.x-btn').css('opacity', '0.0')

      }, 6800);
    });
  


  $(".likebtn").click(function(){
    var id = $(this).attr('id');
    var pid = '#'+ id;
  console.log(pid);
    $(pid).addClass('rotate-left').delay(700).fadeOut(1);
    $.when($('.likebtn').css('opacity', '0.6')
      ).then(function(){
        setTimeout(function(){
          $('.likebtn').css('opacity', '0.0');
        }, 100);
      });
      // $('.buddy').find('.status').remove();
  });

  $(".dislikebtn").click(function(){
    var id = $(this).attr('id');
    var pid = '#'+ id;
  console.log(pid);
    $(pid).addClass('rotate-right').delay(700).fadeOut(1);
      // $('.buddy').find('.status').remove();
       $.when($('.dislikebtn').css('opacity', '0.6')
      ).then(function(){
        setTimeout(function(){
          $('.dislikebtn').css('opacity', '0.0');
        }, 100);
      });
  });

    
  $(".SupperLike").click(function(){
    var id = $(this).attr('id');
    var pid = '#'+ id;
    var sid = '#SupperLikeCss-' + id;
  console.log(pid);
  $.when( 
    $(pid).fadeIn(500).addClass('scale1').delay(2500) ,
  $(sid).css('display', 'block').delay(700).fadeOut(500),
  $('.sbtn').hide()

    ).then(function() {
      $(pid).addClass('spin1').delay(500).fadeOut(1000);
      $('.sbtn').fadeIn(500);

});
    
      // $('.buddy').find('.status').remove();
  });    

  
});