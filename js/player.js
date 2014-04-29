"use strict";

(function(){
	
	window.onload = function (){
		var songs = document.getElementsByTagName("dd");
		for (var i = 0; i < songs.length; i++) {
			songs[i].addEventListener("click", songClick);
		};
		$("#pause").hide();								//Hide pause button by default
		$("#next").bind("click", nextSong);				
		$("#pause").bind("click", pauseSong);
		$("#play").bind("click", playSong);
		$("#previous").bind("click", previousSong);
	};

	// This will change once I modify how songs are played/called
	function songClick(event){
		var playdiv = document.getElementById("player");
		playdiv.innerHTML = '<audio id="audioplayer" controls autoplay><source src="' + event.target.innerHTML + '" type="audio/mpeg"></audio>';
		$("#audioplayer").bind("play", function(){
			alert("Hello");
		});
	}

	function nextSong(){
		alert("Next song not implemented yet.");
	}

	function pauseSong(event){
		$("#pause").hide();
		$("#play").show();
		$("#audioplayer").pause();
	}

	function playSong(event){
		$("#play").hide();
		$("#pause").show();
		$("#audioplayer").play();
	}

	function previousSong(){
		alert("Previous song not implemented yet.");
	}

})();