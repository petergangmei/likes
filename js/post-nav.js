$(document).ready(function(){
  
  $('#index-back').css('display', 'block');
  $('#index-next').css('display', 'block');
//   setInterval(
// function()
//   {
// var pagenumber = $('#page-tracker').val();
//   },1000);
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 300,
        height: 300,
        type: 'square'
    },
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload').on('change', function () { 
  $('#choose-img').css('display', 'none');
  $('#index-back').css('display', 'none');
  $('#index-next').css('display', 'none');

  $('#crop-edit-back').css('display', 'block');
  $('#crop-edit-next').css('display', 'block');

  $('#upload-demo').css('display', 'block'); 
  $('#page-tracker').val('1');

  $('#upload').css('display', 'none');
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
      
    }
    reader.readAsDataURL(this.files[0]);
});

$('#crop-edit-next').on('click', function(ev){
  $('#caption').css('display', 'block');
  $('#crop-edit-back').css('display', 'none');
  $('#text-edit-back').css('display', 'block');
  $('#crop-edit-next').css('display', 'none');
  $('#text-edit-next').css('display', 'block');

$uploadCrop.croppie('result', {
  type: 'canvas',
  size: 'viewport'
}).then(function(resp){
  $('#upload-demo').css('display', 'none');
  // $('#next-btn').css('display', 'none');
  $('#upload-demo-i').css('display', 'block');
  // $('.upload-result').css('display', 'block');
  // $('.upload-back').css('display', 'block');
    html = '<img class="new" src="' + resp + '" />';
        $("#upload-demo-i").html(html);
});
});

$('#text-edit-next').on('click', function (ev) {
  var data = $('.new').attr('src');
  var texcaption = $('#caption').val();
  var token = $('input[name=_token ]').val();

  console.log(texcaption);
  $('.main-box').hide();
  $('.loading').fadeIn(500);
  // console.log(data);
  // $uploadCrop.croppie('result', {
  //   type: 'canvas',
  //   size: 'viewport'
  // }).then(function (resp) {

  //   alert(resp);
// console.log(data);
    $.ajax({
      url: "/addfeed",
      type: "POST",
      data: {
            "_token": token,
            "post": texcaption,
            "image":data,

            },
      success: function (data) {
        window.location = "/feeds";

      }
    });
  // });

});

$('#index-back').on('click', function(){
  window.location = "/feeds";
});
$('#crop-edit-back').on('click', function(){
  window.location = "/addfeed";

  // $('#crop-edit-back').css('display', 'none');
  // $('#crop-edit-next').css('display', 'none');

  // $('#index-back').css('display', 'block');
  // $('#index-next').css('display', 'block');
  // $('#upload').css('display', 'block');
  // $('#choose-img').css('display', 'block');

});

$('#text-edit-back').on('click', function(){
// hide
$('#text-edit-back').css('display', 'none');
$('#text-edit-next').css('display', 'none');
$('#upload-demo-i').css('display', 'none');
$('#caption').css('display', 'none');

// show
$('#crop-edit-back').css('display', 'block');
$('#crop-edit-next').css('display', 'block');
$('#upload-demo').css('display', 'block');
});

});

