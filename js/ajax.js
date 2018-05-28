

$(document).ready(function () {

   $('#addrequest').click(function() {
       var token = $('input[name=_token ').val();
       var user_id = $('#user_id').val();

       $.ajax({
            url: 'addfriend',
            type: 'post',
            data: {
                '_token': token,
                'user_id': user_id,
            },
        })
        .done(function(data) {
            console.log(data);
            $('#addrequest').text(' Requested');
            $('#cancelrequest').text('Looking to cancel Request, clcik here!');
        })
        .fail(function() {
            console.log('fail');
        })
        .always(function() {
            console.log("complete");
        });
   });

});

$(document).ready(function(){

	$('#cancelrequest').click(function() {
		var token = $('input[name=_token ').val();
		var user_id = $('#user_id').val();

		$.ajax({
            url: 'cancelrequest',
            type: 'post',
            data: {
                '_token': token,
                'user_id': user_id,
            },
        })
        .done(function(data) {

            console.log(data);
            location.reload(true);
        })
        .fail(function() {
            console.log('fail');

        })
        .always(function() {
            console.log("complete");
        });
	});

});

$(document).ready(function(){

	$('.accept').each(function(){
		$(this).click(function(){

		var token = $('input[name=_token ').val();
		var visitor_id = $(this).val();

		$.ajax({
            url: 'acceptrequest',
            type: 'post',
            data: {
                '_token': token,
                'visitor_id': visitor_id,
            },
        })
        .done(function(data) {

            console.log(data);
            location.reload(true);
            $('.request_list').load(location.href + ' .request_list')
        })
        .fail(function() {
            console.log('fail');

        })
        .always(function() {
            console.log("complete");
        });

		console.log($(this).val());

		});
	});
});

$(document).ready(function(){

    $('.like').each(function(){
        $(this).click(function(){


        var token = $('input[name=_token ').val();
        var post_id = $(this).val();


        $.ajax({
            url: 'likepost',
            type: 'post',
            data: {
                '_token': token,
                'post_id': post_id,
            },
        })
        .done(function(data) {

            console.log(data);
            // location.reload(true);
            // $('.refresh').load(location.href  + ' .refresh');
        })
        .fail(function() {
            console.log('fail');

        })
        .always(function() {
            console.log("complete");

        });

        console.log($(this).val());


        });
    });


    $('.deleteComment').each(function(){
        $(this).click(function(){


        var token = $('input[name=_token ').val();
        var comment_id = $(this).val();

        $('#deletelink').val(comment_id);
        // console.log($(this).val());


        });
    });


        

});
