$(document).ready(function(){
  
  $(".likebtn").click(function(){
    var id = $(this).attr('id');
    var pid = '#'+ id;
  console.log(pid);
    $(pid).addClass('rotate-left').delay(700).fadeOut(1);
      // $('.buddy').find('.status').remove();
  });

  $(".dislikebtn").click(function(){
    var id = $(this).attr('id');
    var pid = '#'+ id;
  console.log(pid);
    $(pid).addClass('rotate-right').delay(700).fadeOut(1);
      // $('.buddy').find('.status').remove();
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