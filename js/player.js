"use strict";

(function(){
	/*	
		Gino Clement
		Created: 4/28/2014
		Last Modified: 4/28/2014

		This file controls the audio player in the page.

		Notes:
			Need to add code to adjust button sizes
			Add video player support in the future
				Appear in middle of the page?

	*/
	window.addEventListener("load", function (){
		var songs = document.getElementsByTagName("dd");
		for (var i = 0; i < songs.length; i++) {
			songs[i].addEventListener("click", songClick);
		};
		$("#pause").hide();								//Hide pause button by default

		//Music player controls in nav bar
		$("#next").bind("click", nextSong);				
		$("#pause").bind("click", pauseSong);
		$("#play").bind("click", playSong);
		$("#previous").bind("click", previousSong);
	});

	// This will change once I modify how songs are played/called
	function songClick(event){
		var playdiv = document.getElementById("player");
		playdiv.innerHTML = '<audio id="audioplayer" controls autoplay><source src="' + event.target.innerHTML + '" type="audio/mpeg"></audio>';
		// $("#audioplayer").bind("play", function(){
		// 	alert("Play clicked");
		// });
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