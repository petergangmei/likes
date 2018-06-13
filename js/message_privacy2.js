$(document).ready(function(){
var token = $('input[name=_token ]').val();

var uid = $('#uid2').val();
          $.ajax({
            url: 'message_privacy2',
            type: 'post',
            data: {
                '_token': token,
                'uid':uid
            },
        })
        .done(function(data) {
            // $('#addrequest').text(' Requested');
            // $('#cancelrequest').text('Looking to cancel Request, clcik here!');
            console.log(data);
            if(data == 'Notallow'){
            	console.log('You can not send message to peter today');
            $('#greating').hide();
            $('#privacymessage_div').show();
            $('#message').attr("disabled", true);
            $('#sendMessageBtn').attr("disabled", true);

            }
        })
        .fail(function() {
            console.log('fail');
        })
        .always(function() {
            console.log("complete");



        });


});