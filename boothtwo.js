function openCity(selectedSticker)
{
	/*var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
    	tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
    	tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";*/

	var sticker = document.getElementById("sticker");
	var omunye = document.getElementById("omunye");

	sticker.value = selectedSticker;
	omunye.src = selectedSticker;
}