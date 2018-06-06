
console.log('ready');

  $( function() {
var token = $('input[name=_token ').val();
    $( "#location" ).autocomplete({
      _token: 'token',
      source: 'suggestlocation'
    });
  });

