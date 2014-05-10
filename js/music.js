"use strict";

(function(){

	window.addEventListener("load", function (){
		loadSongs();

	});

	function loadSongs(){
		//AJAX to get a JSON list of songs

		//Iterate over JSON and add to table
		var table = $("#musictable");

		//For each in list of songs
		table.append("tr");
		
	}

})();