$(document).ready(function(){

$('.foc').focus(function(){
	$(this).css('border', '1px solid silver');
});


$('#signup').click(function(){

var name = $('#name').val();
var email = $('#email').val();
var date = $('#date').val();
var month = $('#month').val();
var year = $('#year').val();
var country = $('#country').val();
var location = $('#location').val();
var pas1 = $('#password').val();
var pas2 = $('#password-confirm').val();

if (name == '') {
	$('#toast').html('Name field empty.');
	$('#name').css('border', '1px solid red');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);

});
return false; 
}
if (email == '') {
	$('#toast').html('Email field empty.');
	$('#email').css('border', '1px solid red');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);

});
return false; 
}

if (date == 'none' || month == 'none' || year == 'none') {
	$('#toast').html('Set your birthday.');
	$('#date').css('border', '1px solid red');
	$('#month').css('border', '1px solid red');
	$('#year').css('border', '1px solid red');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);

});
return false; 
}
if (location == 'location') {
	$('#toast').html('Region field empty.');
	$('#location').css('border', '1px solid red');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);

});
return false; 
}
if (country == 'country') {
	$('#toast').html('Select your Country.');
	$('#country').css('border', '1px solid red');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);

});
return false; 
}

if (pas1 == '' || pas2 == '') {
	$('#toast').html('Passwored field empty!');
	$('#password').css('border', '1px solid red');
	$('#password-confirm').css('border', '1px solid red');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);

});
return false;
}

if (pas1 !== pas2) {
	$('#toast').html('Passwored Not Match!');
	$('#password').css('border', '1px solid red');
	$('#password-confirm').css('border', '1px solid red');
	console.log(' some field is empty');
	console.log(name);
	
	$.when( $('.toast-body').fadeIn(500) ).then(function() {
		setTimeout(function(){ 
  $('.toast-body').fadeOut(500);
  }, 2000);

});
return false;
}


});

});