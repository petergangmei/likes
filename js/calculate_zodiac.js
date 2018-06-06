$(document).ready(function(){
    $("select.country").change(function(){
        var selectedCountry = $(".country option:selected").val();
        alert("You have selected the country - " + selectedCountry);
    });
});

$(document).ready(function(){
var cdate = $('.date option:selected').val();
var cmonth = $(".month option:selected").val();
var cyear = $('.year option:selected').val();

setInterval(
function()
    {
var cdate = $('.date option:selected').val();
var cmonth = $(".month option:selected").val();
var cyear = $('.year option:selected').val();  
// console.log(cdate);
// console.log(cmonth);
// console.log(cyear);  	
if(cdate == 'none' || cmonth == 'none'){
	console.log('Not selected');

}else{
	console.log('all selected');
var date = $(".date option:selected").val();
var month = $(".month option:selected").val();

if (month == 1 && date >=20 || month == 2 && date <=18) {value = "Aquarius";}
if (month == 1 && date > 31) {value = "Huh?";}
if (month == 2 && date >=19 || month == 3 && date <=20) {value = "Pisces";}
if (month == 2 && date > 29) {value = "Say what?";}
if (month == 3 && date >=21 || month == 4 && date <=19) {value = "Aries";}
if (month == 3 && date > 31) {value = "OK.  Whatever.";}
if (month == 4 && date >=20 || month == 5 && date <=20) {value = "Taurus";}
if (month == 4 && date > 30) {value = "I'm soooo sorry!";}
if (month == 5 && date >=21 || month == 6 && date <=21) {value = "Gemini";}
if (month == 5 && date > 31) {value = "Umm ... no.";}
if (month == 6 && date >=22 || month == 7 && date <=22) {value = "Cancer";}
if (month == 6 && date > 30) {value = "Sorry.";}
if (month == 7 && date >=23 || month == 8 && date <=22) {value = "Leo";}
if (month == 7 && date > 31) {value = "Excuse me?";}
if (month == 8 && date >=23 || month == 9 && date <=22) {value = "Virgo";}
if (month == 8 && date > 31) {value = "Yeah. Right.";}
if (month == 9 && date >=23 || month == 10 && date <=22) {value = "Libra";}
if (month == 9 && date > 30) {value = "Try Again.";}
if (month == 10 && date >=23 || month == 11 && date <=21) {value = "Scorpio";}
if (month == 10 && date > 31) {value = "Forget it!";}
if (month == 11 && date >=22 || month == 12 && date <=21) {value = "Sagittarius";}
if (month == 11 && date > 30) {value = "Invalid Date";}
if (month == 12 && date >=22 || month == 1 && date <=19) {value = "Capricorn";}
if (month == 12 && date > 31) {value = "No way!";}
// console.log(value);
$('#zodiac').val(value);

}

  }, 2000);


// $('#zodiac').click(function(){


// });


});
