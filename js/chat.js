$(document).ready(function () {
 $("html, body").animate({ scrollTop: $(document).height() }, 800);


   $('#sendMessageBtn').click(function() {
       var token = $('input[name=_token ').val();
       var message = $('#message').val();
       var user2 = $('#user2').val();
       var uid2 = $('#uid2').val();

       $.ajax({
            url: 'sendMessage',
            type: 'post',
            data: {
                '_token': token,
                'message': message,
                'user2': user2,
                'uid2': uid2
            },
        })
        .done(function(data) {
            console.log(data);
            // $('#addrequest').text(' Requested');
            // $('#cancelrequest').text('Looking to cancel Request, clcik here!');
        })
        .fail(function() {
            console.log('fail');
        })
        .always(function() {
            console.log("complete");


            $('#messagecontent').load(' #messagecontent');
            $('#message').val('');
 $("html, body").animate({ scrollTop: $(document).height() }, 1000);

        });
   });

setInterval(
function()
	{

       var token = $('input[name=_token ').val();
       var user2 = $('#user2').val();
       var uid2 = $('#uid2').val();
		// $('#messagecontent').load(' Gouri2');
            // location.reload(true);

            // window.scrollTo(0,1000);

$.ajax({
            url: 'checkunseen',
            type: 'post',
            data: {
                '_token': token,
                'user2': user2,
                'uid2': uid2
            },
        })
        .done(function(data) {
            console.log(data);
            // $('#addrequest').text(' Requested');
            // $('#cancelrequest').text('Looking to cancel Request, clcik here!');
                   if (data == 'available'){
                   	$.when( $('#messagecontent').load(' #messagecontent') ).then(function( data, textStatus, jqXHR ) {
   $("html, body").animate({ scrollTop: $(document).height() }, 1000);
});
            



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

