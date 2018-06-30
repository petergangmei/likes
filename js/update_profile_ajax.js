$(document).ready(function(){
console.log('ready! update profile ajax');
$('#close-btn').click(function(){
	console.log('close btn clicked');
 	window.location.href = "/menu";

});
$('#ok-btn-update-profile').click(function(){
console.log('click');
  var token = $('input[name=_token ]').val();
  var name = $('#name').val();
  var location = $('#location').val();
  var country = $('#country').val();
  var email = $('#email').val();
  var zodiac = $('#zodiac').val();

if(name == ""){
	$('#toast').html('Name field empty.');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);
});
	return false;
}

if(location == ""){
	$('#toast').html('Location field empty.');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);
});
	return false;
}

if(email == ""){
	$('#toast').html('Email field empty.');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);
});
	return false;
}

$.ajax({
	url: 'update_profile',
	type: 'post',
	data:{
		'_token': token,
		'name': name,
		'location': location,
		'country':country,
		'zodiac':zodiac,
		'email': email
	},
}).done(function(data){
	console.log('success');
	setTimeout(function(){ 
	window.location.href = "/home"; 
	}, 1000);
	
}).fail(function(){
	console.log('fail');
		setTimeout(function(){ 
	window.location.href = "/edit_profile"; 
	}, 1000);
}).always(function(){
	console.log('completed');
});

});

// update preferances
$('#ok-btn-update-preferance').click(function(){
   $("html, body").animate({ scrollTop: $(document).height() }, 1000);

	$('#toast').html('Click on update button to update your preferances....');
	console.log('click');
	$.when( $('.toast-body').fadeIn(500).css('background-color', '#26FA37').css('color', 'black') ).then(function() {
		setTimeout(function(){ 
	  $('.toast-body').fadeOut(500);

	  }, 2000);
	});

});

$('#update-preferance-submit').click(function(){
var v1 = $('input[name="coffee-tea"]:checked').val();
var v2 = $('input[name="softdrinks-harddrinks"]:checked').val();
var v3 = $('input[name="veg-nonveg"]:checked').val();
var v4 = $('input[name="bike-car"]:checked').val();
var v5 = $('input[name="summer-winter"]:checked').val();
var v6 = $('input[name="day-night"]:checked').val();
var v7 = $('input[name="cat-dog"]:checked').val();
var v8 = $('input[name="family-friends"]:checked').val();
var v9 = $('input[name="movie"]:checked').val();
	if(v9 == 'null' || v8 == 'null' || v7 == 'null' || v6 == 'null' || v5 == 'null' || v4 == 'null' || v3 == 'null' || v2 == 'null' || v1 == 'null'){
	$('#toast').html('You can not update preferances if you leave any preferances option unselected..');
	console.log('click');
	$.when( $('.toast-body').fadeIn(500).css('background-color', '#DA5A3E').css('color', 'white') ).then(function() {
		setTimeout(function(){ 
	  $('.toast-body').fadeOut(500);
	  }, 2000);
	});


	return false;
	}
});

// update account settings
$('#ok-btn-update-account-setting').click(function(){
    var token = $('input[name=_token ]').val();
	var p1 = $('#message_privacy').val();
	var p2 = $('#message_privacy2').val();
	var p3 = $('#comment_privacy').val();
	console.log('click');
	console.log(p1);
	console.log(p2);
	console.log(p3);
$.ajax({
	url: 'update_accountSetting',
	type: 'post',
	data:{
		'_token': token,
		'message_privacy': p1,
		'message_privacy2': p2,
		'comment_privacy':p3,
	},
}).done(function(data){
	console.log('success');
	setTimeout(function(){ 
	window.location.href = "/home"; 
	}, 1000);
	
}).fail(function(){
	console.log('fail');
		setTimeout(function(){ 
	window.location.href = "/account_setting"; 
	}, 1000);
}).always(function(){
	console.log('completed');
});

});
// account deactivate button
$('#deactivate_account').click(function(){
var token = $('input[name=_token ]').val();
var status = $('#account_status').val();

console.log(status);
$.ajax({
	url: 'update_accountStatus',
	type: 'post',
	data:{
		'_token': token,
		'account_status':status,
	},
}).done(function(data){
	console.log('success');
	setTimeout(function(){ 
	window.location.href = "/account_setting"; 
	}, 500);
	
}).fail(function(){
	console.log('fail');
		setTimeout(function(){ 
	window.location.href = "/account_setting"; 
	}, 500);
}).always(function(){
	console.log('completed');
});

});

});