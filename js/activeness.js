  $(document).ready(function(){
  var token = $('input[name=_token ]').val();

    setInterval(
    function()
        {
          console.log('active');
       $.ajax({
          url: "/update_activeness",
          type: "POST",
          data: {
                "_token": token,
                },
          success: function (data) {
           console.log(data);

          }
        });
        
        }, 5000);
  });