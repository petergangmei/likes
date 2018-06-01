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
             	$('#navibar').load(' #navibar');
             	console.log('notification available');
             	// $('#message2').load(' #message2');
                   	// $.when(  ).then(function( data, textStatus, jqXHR ) {
   			// $("html, body").animate({ scrollTop: $(document).height() }, 1000);
			// });
            }else{

                console.log('no notification');
             	$('#navibar').load(' #navibar');

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

	
	}, 3000);

});
});