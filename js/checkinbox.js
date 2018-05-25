$(document).ready(function(){

setInterval(
function()
	{
       var token = $('input[name=_token ').val();
       // var user2 = $('#user2').val();
       var uid = $('#uid2').val();

$.ajax({
            url: 'checkinbox',
            type: 'post',
            data: {
                '_token': token,
                'uid': uid
            },
        })
        .done(function(data) {
            console.log(data);
             if (data == 'available'){
             	$('#message').load(' #message');
             	$('#message2').load(' #message2');
                   	// $.when(  ).then(function( data, textStatus, jqXHR ) {
   			// $("html, body").animate({ scrollTop: $(document).height() }, 1000);
			// });
            }
        })
        .fail(function() {
            console.log('fail');
            // $('#messagecontent').reload(true);
        })
        .always(function() {
            console.log("complete");
        });

	
	console.log('sec1');
	}, 800);

});