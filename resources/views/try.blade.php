<script language="javascript">

//Western & Chinese Astrological Sign Calculator- By Timothy Joko-Veltman
//Email: restlessperegrine@yahoo.com URL: http://openmind.digitalrice.com
//Visit JavaScript Kit (http://javascriptkit.com) for script

function signs() {
var start = 1901, birthyear = document.zodiac.year.value, date=document.zodiac.date.value, month=document.zodiac.month.selectedIndex;

with (document.zodiac.sign){

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
}
x = (start - birthyear) % 12
with (document.zodiac.csign){
if (x == 1 || x == -11) {value = "Rat";}
if (x == 0) {value = "Ox";}
if (x == 11 || x == -1) {value = "Tiger";}
if (x == 10 || x == -2) {value = "Rabbit/Cat";}
if (x == 9 || x == -3)  {value = "Dragon";}
if (x == 8 || x == -4)  {value ="Snake";}
if (x == 7 || x == -5)  {value = "Horse";}
if (x == 6 || x == -6)  {value = "Sheep";}
if (x == 5 || x == -7)  {value = "Monkey";}
if (x == 4 || x == -8)  {value = "Cock/Phoenix";}
if (x == 3 || x == -9)  {value = "Dog";}
if (x == 2 || x == -10)  {value = "Boar";}  

}
}
</script>

<center><b>Calculate your Western and Chinese Astrological Signs</b></center>
<form name="zodiac">
<center>
<table bgcolor="#eeaa00" border="2" bordercolor="#000000" rules="none" cellspacing="0" cellpadding="4">
	<tr><td><b><i>Year</i></b></td>
	<td><div align="right"><input type="text" size="10" name="year" value="Birth Year" onClick=value=""></div></td>
	<td><!--This empty field is just for appearance--></td>
	<tr><td><b><i>Month</i></b></td>
	<td><div align="right">
<select name="month">
<option value="x">Select Birth Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select></div></td>
	<td><!--This empty field is just for appearance--></td></tr>
	<tr><td><b><i>Day</i></b></td>
	<td><div align="right"><input type="text" name="date"value="Day" size="3" onClick=value=""></td>
	<td><input type="button" value="Calculate" onClick="signs()"></div></td></tr>
	<tr><td><b><i>Sun Sign:</i></b></td>
	<td><div align="right"><input type="text" name="sign" size="12" value="" align="right"></div</td></tr>
	<td><!--This empty field is just for appearance--></td></tr>
	<tr><td><b><i>Chinese Sign:</i></b></td>
	<td><div align="right"><input type="text" name="csign" size="12"></div></td>
	<td><!--This empty field is just for appearance--></td></tr>

</table>
</center>
</form>

<p align="center">This free script provided by<br />
<a href="http://www.javascriptkit.com">JavaScript
Kit</a></p>