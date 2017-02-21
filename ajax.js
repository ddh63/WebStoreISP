function addCityState(data, status) {
	if (data != "") {
		var arr = data.split(',');

		var city = arr[0];
		var state = arr[1].trim();

		$('input[name="city"]').val(city);
		$('input[name="state"]').val(state);
	}
}


function getCityState(zip) {
  var ajaxSettings = {
    type: "GET",
    url: "getCityState.php?zip=" + zip,
    mimeType: "text"
  }
  
  $.ajax(ajaxSettings).done(addCityState);
}