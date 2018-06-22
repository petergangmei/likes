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
  
});