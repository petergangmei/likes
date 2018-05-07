@extends('layouts.app')
@section('content')
<div class="containter" style="text-align: center;">
	<form method="POST" action="/update_preference">
          @csrf
		<!-- coffee/tea -->
	<div class="card">
		<b style="position: absolute;">(1)</b>
    	<div class="card-body">
    		What would you prefer?<br><br>
    		<input type="checkbox" name="coffee-tea" id="coffee_" value="Coffee" class="display-none">
    		<input type="checkbox" name="coffee-tea" id="tea_" value="Tea" class="display-none">
    		<button type="button" id="coffee" class="btn btn-outline-info btn-prefered preference_btn_width" value="false">Coffee</button>
    		<button type="button" id="tea" class="btn btn-outline-info preference_btn_width" value="false">tea</button>
		</div>
	</div>

	<!-- soft/hard drinks -->
	<div class="card">
		<b style="position: absolute;">(2)</b>
    	<div class="card-body">
    		You like:-<br><br>
    		<input type="checkbox" name="softdrinks-harddrinks" id="softdrinks_" value="Softdrinks" class="display-none">
    		<input type="checkbox" name="softdrinks-harddrinks" id="harddrinks_" value="Harddrinks" class="display-none">    		
    		<button type="button" id="softdrinks" class="btn btn-outline-info preference_btn_width">soft drinks</button>
    		<button type="button" id="harddrinks" class="btn btn-outline-info preference_btn_width">hard drinks</button>
		</div>
	</div>	
	
	<!-- veg. and none-veg.	 -->
	<div class="card">
		<b style="position: absolute;">(3)</b>
    	<div class="card-body">
    		What do you like eating?<br><br>
    		<input type="checkbox" name="veg-nonveg" id="veg_" value="Veg." class="display-none">
    		<input type="checkbox" name="veg-nonveg" id="nonveg_" value="Non-veg." class="display-none">
    		<button type="button" id="veg" class="btn btn-outline-info preference_btn_width">Veg. </button>
    		<button type="button" id="nonveg" class="btn btn-outline-info preference_btn_width">Non-Veg.</button>
		</div>
	</div>	

	<!-- Bike and car -->
	<div class="card">
		<b style="position: absolute;">(4)</b>
    	<div class="card-body">
    		You prefer travelling on:-<br><br>
    		<input type="checkbox" name="bike-car" id="bike_" value="Bike" class="display-none">
    		<input type="checkbox" name="bike-car" id="car_" value="Car" class="display-none">
    		<button type="button" id="bike" class="btn btn-outline-info preference_btn_width">Bike</button>
    		<button type="button" id="car" class="btn btn-outline-info preference_btn_width">Car</button>
		</div>
	</div>
	<div class="card">
		
		<b style="position: absolute;">(5)</b>
    	<div class="card-body">
    		Which vacation you like more?<br><br>
    		<input type="checkbox" name="summer-winter" id="summer_" value="Summer" class="display-none">
    		<input type="checkbox" name="summer-winter" id="winter_" value="Winter" class="display-none">
    		<button type="button" id="summer" class="btn btn-outline-info preference_btn_width">Summer</button>
    		<button type="button" id="winter" class="btn btn-outline-info preference_btn_width">Winter</button>
		</div>
	</div>	
	<div class="card">
		
		<b style="position: absolute;">(6)</b>
    	<div class="card-body">
    		Which time do youu consider as the best hours to hang out with firends :-<br><br>
    		<input type="checkbox" name="day-night" id="day_" value="Day" class="display-none">
    		<input type="checkbox" name="day-night" id="night_" value="Night" class="display-none">    		
    		<button type="button" id="day" class="btn btn-outline-info preference_btn_width">Day</button>
    		<button type="button" id="night" class="btn btn-outline-info preference_btn_width">Night</button>
		</div>
	</div>
	<div class="card">
		
		<b style="position: absolute;">(7)</b>
    	<div class="card-body">
    		If you were to have at least one of this as your pet, what would that be?<br><br>
    		<input type="checkbox" name="cat-dog" id="cat_" value="Cat" class="display-none">
    		<input type="checkbox" name="cat-dog" id="dog_" value="Dog" class="display-none">
    		<button type="button" id="cat" class="btn btn-outline-info preference_btn_width">Cat</button>
    		<button type="button" id="dog" class="btn btn-outline-info preference_btn_width">Dog</button>
		</div>
	</div>	
	<div class="card">
		
		<b style="position: absolute;">(8)</b>
    <div class="card-body">
    		Do you like hagging out with:-<br><br>
    		<input type="checkbox" name="family-friends" id="family_" value="Family" class="display-none">
    		<input type="checkbox" name="family-friends" id="friends_" value="Friends" class="display-none">
    		<button type="button" id="family" class="btn btn-outline-info preference_btn_width">Family</button>
    		<button type="button" id="friends" class="btn btn-outline-info preference_btn_width">Friends</button>
		</div>
	</div>	
	<div class="card">
		
		<b style="position: absolute;">(9)</b>
    	<div class="card-body">
    		Movies you loves to watch:-<br><br>
    		<input type="checkbox" name="movie" id="lovestory_" value="Lovestory" class="display-none">
    		<input type="checkbox" name="movie" id="horror_" value="Horror film" class="display-none">
    		<input type="checkbox" name="movie" id="war_" value="War film" class="display-none">
    		<button type="button" id="lovestory" class="btn btn-outline-info ">Lovestory</button>
    		<button type="button" id="horror" class="btn btn-outline-info ">Horror film</button>
    		<button type="button" id="war" class="btn btn-outline-info ">War film</button>
		</div>
	</div>
	<div class="card">
		<b style="position: absolute;">(10)</b>
    	<div class="card-body">
    		Once you have slept for this long you are good to gofor another day, choose the hours:-<br><br>
    		<select class="sleep-hours form-control" name="sleep-hours" id="sleephours">
			    <option selected>Choose...</option>
			    <option value="4">4 (four hours)</option>
			    <option value="5">5 (five hours)</option>
			    <option value="6">6 (six hours)</option>
			    <option value="7">7 (seven hours)</option>
			    <option value="8">8 (eight hours)</option>
			    <option value="9">9 (nine hours)</option>
			    <option value="10">10 (ten hours)</option>
			  </select>
		</div>
	</div>
		<button type="Submit" class="btn-primary btn-lg btn-block cursor-pointer">Submit</button>
	<br><br><br>

	</form>


	<br><br><br>
</div>
@endsection