$(document).ready(function(){
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
 $('#softdrinks').click(function(){
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

