$(document).ready(function(){
console.log('ready');
$(document).ready(function(){

setInterval(
function()
    {
       var token = $('input[name=_token ').val();

$.ajax({
            url: 'checknotification',
            type: 'post',
            data: {
                '_token': token,
            },
        })
        .done(function(data) {
             if (data == 'available'){
                // location.reload(true);
                $('#notificationlist').load(' #notificationlist');
                // $('#navibar').load(' #navibar');
                console.log('notification available');
                // $('#message2').load(' #message2');
                    // $.when(  ).then(function( data, textStatus, jqXHR ) {
            // $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            // });
            }else{

                console.log('no notification');
                $('#notificationlist').load(' #notificationlist');
                // $('#navibar').load(' #navibar');

                // location.reload(true);
                

                // $('#noti').load(' #noti');

            }
        })
        .fail(function() {
            console.log('fail');
            // $('#messagecontent').reload(true);
        })
        .always(function() {
            
        });

    
    }, 2000);
setInterval(
function()
    {
       var token = $('input[name=_token ').val();

$.ajax({
            url: 'checkmessagealert',
            type: 'post',
            data: {
                '_token': token,
            },
        })
        .done(function(data) {
             if (data == 'available'){
                console.log('message available');
                $('.message-alert').fadeIn(1000);

                // $('#message2').load(' #message2');
                    // $.when(  ).then(function( data, textStatus, jqXHR ) {
            // $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            // });
            }else{
                $('.message-alert').fadeOut(1000);
                console.log('no message alert');

            }
        })
        .fail(function() {
            console.log('fail');
            // $('#messagecontent').reload(true);
        })
        .always(function() {
            console.log('always');
            
        });

    
    }, 2000);

});
});