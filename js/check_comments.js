$(document).ready(function(){
console.log('ready');
$(document).ready(function(){

setInterval(
function()
    {
     $('#viewupdatedpost').load(' #viewupdatedpost');
     $('#viewupdatedpos2').load(' #viewupdatedpost2');
     $('.refresh').load(' .refresh');
         console.log('loaded');
    }, 3000);

});
});