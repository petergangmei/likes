
$(document).ready(function(){

$(".glclick").click(function(){
    var status = ($(this).attr("id"));
    var gl = ($(this).attr("value"));
    if(gl == 'List'){
        $('.fdivs').css('width', '100%');
        $('.fphotos').css('width', '100%');
        $('.fphotos').css('height', '100%');
    }else{
        $('.fdivs').css('width', '140');
        $('.fphotos').css('width', '140px');
        $('.fphotos').css('height', '140px');
    }
    console.log(gl);
});

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

	
	}, 2000);

});
