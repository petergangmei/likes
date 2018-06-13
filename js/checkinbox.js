$(document).ready(function(){

setInterval(
function()
	{
       var token = $('input[name=_token ').val();
       var uid2 = $('#uid2').val();

$.ajax({
            url: 'checkinbox',
            type: 'post',
            data: {
                '_token': token,
                'uid2': uid2
            },
        })
        .done(function(data) {
            console.log(data);
             if (data == 'available'){
             	$('#message').load(' #message');
             	// $('#message2').load(' #message2');
                   	// $.when(  ).then(function( data, textStatus, jqXHR ) {
   			// $("html, body").animate({ scrollTop: $(document).height() }, 1000);
			// });
            }else{

                console.log('no message');
                $('#message').load(' #message');

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
	}, 1000);

});