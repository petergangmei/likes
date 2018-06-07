$(document).ready(function(){
    $(".likeimage").dblclick(function(){
  var link = ($(this).attr("src"));
  var post = ($(this).attr("id"));
  var likes = parseInt($(this).attr("value"));

  if(link == "public/storage/default_image/icons/heart1.png"){
    var newlink = "public/storage/default_image/icons/heart2.png";
    var newlikes = likes + 1;
  }else{
    var newlink = "public/storage/default_image/icons/heart1.png";
    var newlikes = likes - 1;
  }
  ($(this).attr("src", newlink));

  var post_id = '#_' + post;
   console.log(post_id);
  console.log(likes);
  console.log(newlikes);

  $(post_id).html(newlikes);
  ($(this).attr("value", newlikes));
    });
});

$(document).ready(function(){
console.log('readynnow');


$(".like-heart").click(function(){
  var link = ($(this).attr("src"));
  var post = ($(this).attr("id"));
  var likes = parseInt($(this).attr("value"));

  if(link == "public/storage/default_image/icons/heart1.png"){
    var newlink = "public/storage/default_image/icons/heart2.png";
    var newlikes = likes + 1;
  }else{
    var newlink = "public/storage/default_image/icons/heart1.png";
    var newlikes = likes - 1;
  }
  ($(this).attr("src", newlink));

  var post_id = '#_' + post;
   console.log(post_id);
  console.log(likes);
  console.log(newlikes);

  $(post_id).html(newlikes);
  ($(this).attr("value", newlikes));

 // $('#deletelink').attr('href', link);
});


});

$(document).ready(function(){

$(".cmt").click(function(){
  var comment_id = ($(this).attr("id"));
  var link = 'deletecommentid-' + comment_id;
 console.log(comment_id);
 $('#deletelink').attr('href', link);
});

$(".reportcmt").click(function(){
  var comment_id = ($(this).attr("id"));
  var link = 'reportcommentid-' + comment_id;
 console.log(comment_id);
 $('#reportlink').attr('href', link);
});

    $("#bio-edit").click(function(){
    	$('#bio').hide();
    	$('#bio-edit').hide();
    	$('#bioTextarea').show();
    	$('#update-bio').show();
    	$('#cancel-bio').show();
    });
    $('#cancel-bio').click(function(){
     	$('#bio').show();
    	$('#bio-edit').show();
    	$('#bioTextarea').hide();
    	$('#update-bio').hide();
    	$('#cancel-bio').hide();   	
    });
});

$(document).ready(function(){

// coffee and tea
 $('#coffee').click(function(){
    $('#default_value1').attr('checked', false);
    $('#coffee').css('background-color','black').css('color','white').val('true');
    $('#coffee_').attr('checked', true);
    // remove value [++]
    $val = $('#tea').val();
    if($val == "true"){
        $('#tea').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#tea_').attr('checked', false);
    }
 });
 
  $('#tea').click(function(){

    $('#default_value1').attr('checked', false);
    $('#tea').css('background-color','black').css('color','white').val('true');
    $('#tea_').attr('checked', true);

    // remove value [++]
    $val = $('#coffee').val();
    if($val == "true"){
        $('#coffee').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#coffee_').attr('checked', false);
    }
 });

// soft and hard drinks
 $('#softdrinks').click(function(){
    $('#default_value2').attr('checked', false);
    $('#softdrinks').css('background-color','black').css('color','white').val('true');
    $('#softdrinks_').attr('checked', true);
    // remove value    
    $val = $('#harddrinks').val();
    if($val = "true"){
        $('#harddrinks').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#harddrinks_').attr('checked', false);
    }
 });
 
  $('#harddrinks').click(function(){
    $('#default_value2').attr('checked', false);
    $('#harddrinks').css('background-color','black').css('color','white').val('true');
    $('#harddrinks_').attr('checked', true);
    // remove value [++]
    $val = $('#tea').val();
    if($val = "true"){
        $('#softdrinks').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#softdrinks_').attr('checked', false);
    }
 });


 // veg. and non- veg.
 $('#veg').click(function(){
    $('#default_value3').attr('checked', false);
    $('#veg').css('background-color','black').css('color','white').val('true');
    $('#veg_').attr('checked', true);
    // remove value    
    $val = $('#nonveg').val();
    if($val = "true"){
        $('#nonveg').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#nonveg_').attr('checked', false);
    }
 });
 
  $('#nonveg').click(function(){
    $('#default_value3').attr('checked', false);
    $('#nonveg').css('background-color','black').css('color','white').val('true');
    $('#nonveg_').attr('checked', true);
    // remove value [++]
    $val = $('#tea').val();
    if($val = "true"){
        $('#veg').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#veg_').attr('checked', false);
    }
 }); 

  // bike and car
 $('#bike').click(function(){
    $('#default_value4').attr('checked', false);
    $('#bike').css('background-color','black').css('color','white').val('true');
    $('#bike_').attr('checked', true);
    // remove value    
    $val = $('#car').val();
    if($val = "true"){
        $('#car').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#car_').attr('checked', false);
    }
 });
 
  $('#car').click(function(){
    $('#default_value4').attr('checked', false);
    $('#car').css('background-color','black').css('color','white').val('true');
    $('#car_').attr('checked', true);
    // remove value [++]
    $val = $('#bike').val();
    if($val = "true"){
        $('#bike').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#bike_').attr('checked', false);
    }
 }); 

  // summer and winter
 $('#summer').click(function(){
    $('#default_value5').attr('checked', false);
    $('#summer').css('background-color','black').css('color','white').val('true');
    $('#summer_').attr('checked', true);
    // remove value    
    $val = $('#winter').val();
    if($val = "true"){
        $('#winter').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#winter_').attr('checked', false);
    }
 });
 
  $('#winter').click(function(){
    $('#default_value5').attr('checked', false);
    $('#winter').css('background-color','black').css('color','white').val('true');
    $('#winter_').attr('checked', true);
    // remove value [++]
    $val = $('#summer').val();
    if($val = "true"){
        $('#summer').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#summer_').attr('checked', false);
    }
 }); 

// day and night
 $('#day').click(function(){
    $('#default_value6').attr('checked', false);
    $('#day').css('background-color','black').css('color','white').val('true');
    $('#day_').attr('checked', true);
    // remove value    
    $val = $('#night').val();
    if($val = "true"){
        $('#night').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#night_').attr('checked', false);
    }
 });
 
  $('#night').click(function(){
    $('#default_value6').attr('checked', false);
    $('#night').css('background-color','black').css('color','white').val('true');
    $('#night_').attr('checked', true);
    // remove value [++]
    $val = $('#day').val();
    if($val = "true"){
        $('#day').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#day_').attr('checked', false);
    }
 }); 
  // cat and dog
   $('#cat').click(function(){
    $('#default_value7').attr('checked', false);
    $('#cat').css('background-color','black').css('color','white').val('true');
    $('#cat_').attr('checked', true);
    // remove value    
    $val = $('#dog').val();
    if($val = "true"){
        $('#dog').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#dog_').attr('checked', false);
    }
 });
 
  $('#dog').click(function(){
    $('#default_value7').attr('checked', false);
    $('#dog').css('background-color','black').css('color','white').val('true');
    $('#dog_').attr('checked', true);
    // remove value [++]
    $val = $('#cat').val();
    if($val = "true"){
        $('#cat').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#cat_').attr('checked', false);
    }
 }); 

// family and friends
 $('#family').click(function(){
    $('#default_value8').attr('checked', false);
    $('#family').css('background-color','black').css('color','white').val('true');
    $('#family_').attr('checked', true);
    // remove value    
    $val = $('#friends').val();
    if($val = "true"){
        $('#friends').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#friends_').attr('checked', false);
    }
 });
 
  $('#friends').click(function(){
    $('#default_value8').attr('checked', false);
    $('#friends').css('background-color','black').css('color','white').val('true');
    $('#friends_').attr('checked', true);
    // remove value [++]
    $val = $('#family').val();
    if($val = "true"){
        $('#family').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#family_').attr('checked', false);
    }
 }); 

// movies
 $('#lovestory').click(function(){
    $('#default_value9').attr('checked', false);
    $('#lovestory').css('background-color','black').css('color','white').val('true');
    $('#lovestory_').attr('checked', true);
    // remove value    
    $val = $('#horror').val();
    if($val = "true"){
        $('#horror').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#horror_').attr('checked', false);
    }
    $val2 = $('#war').val();
    if($val2 = "true"){
        $('#war').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#war_').attr('checked', false);
    }

 });
 
  $('#horror').click(function(){
    $('#default_value9').attr('checked', false);
    $('#horror').css('background-color','black').css('color','white').val('true');
    $('#horror_').attr('checked', true);
    // remove value [++]
    $val = $('#lovestory').val();
    if($val = "true"){
        $('#lovestory').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#lovestory_').attr('checked', false);
    }
    $val2 = $('#war').val();
    if($val2 = "true"){
        $('#war').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#war_').attr('checked', false);
    }
 }); 

$('#war').click(function(){
    $('#default_value9').attr('checked', false);
    $('#war').css('background-color','black').css('color','white').val('true');
    $('#war_').attr('checked', true);
    // remove value [++]
    $val = $('#lovestory').val();
    if($val = "true"){
        $('#lovestory').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#lovestory_').attr('checked', false);
    }
    $val2 = $('#horror').val();
    if($val2 = "true"){
        $('#horror').css('background-color', 'white').css('color', 'skyblue').val('false');
    $('#horror_').attr('checked', false);
    }
 }); 


// search by name or search by preference 

$matchedval = $('#matched').val();
 if($matchedval == "Matchresult"){
    $("#text1").text('No coins required when you matchout to the same person!');
 }else{
 }
 
});


//display comment and post comment.

