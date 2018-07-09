$(document).ready(function(){

// 	setInterval(
// function()
//     {

    var user_active = $('#user_active').val();
if (
	user_active == '1 second ago'||
	user_active == '2 seconds ago'||
	user_active == '3 seconds ago'||
	user_active == '4 seconds ago'||
	user_active == '5 seconds ago'||
	user_active == '6 seconds ago'||
	user_active == '7 seconds ago'||
	user_active == '8 seconds ago'||
	user_active == '9 seconds ago'||
	user_active == '10 seconds ago'
	) {
	$('#active_now').show();
	$('#activeness_box').css('background-color', '#89F980');
 console.log('NOW active_now');
	
	}else{
	$('#last_seen').show();
	$('#activeness_box').css('background-color', '#FFF8E0');
 console.log('NOT ACTIVE ANYMORE');

	}
 console.log('acc');
// $('#activeness_box').load(' #activeness_box');
    

    // }, 1000);




});