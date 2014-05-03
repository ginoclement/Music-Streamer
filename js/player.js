"use strict";

(function(){
	/*	
		Gino Clement
		Created: 4/28/2014

		This file controls the audio player in the page.

		Notes:
			Need to add code to adjust button sizes
			Add video player support in the future
				Appear in middle of the page?

	*/
	
	// Variables
	// var source = $("#musicsource");
	// var player = $("#audioplayer");
	var playingnow = [];

	window.addEventListener("load", function (){
		//Bind all listed songs with a click function
		$("dd").bind("click", songClick)



		$("#pause").hide();								//Hide pause button by default
		//Music player controls in nav bar
		$("#next").bind("click", nextSong);				
		$("#pause").bind("click", pauseSong);
		$("#play").bind("click", playSong);
		$("#previous").bind("click", previousSong);

		var player = $("#audioplayer");
		player.bind("ended", songOver);

	});

	// This will change once I modify how songs are played/called
	function songClick(event){
		//Add song to playlist
		playingnow.push(event.target.innerHTML);
		//If there is no song loaded

		if($("#musicsource").attr("src") == ""){
			//Load and play song\
			nextSong()
		}



		// //Add song to the beginning of playingnow
		// playingnow.unshift(event.target.innerHTML);
		// //Set audio player source to that of the song
		// $("#musicsource").attr("src",event.target.innerHTML);
		// $("#audioplayer").trigger("load");
		// //Play song
		// playSong();
	}

	function songOver(){
		nextSong();
	}

	function nextSong(){
		if(playingnow.length != 0){
			//Load next song
			$("#musicsource").attr("src",playingnow.shift(event.target.innerHTML));
			$("#audioplayer").trigger("load");
			//Start playing next song
			// playSong();
		}

	}

	function pauseSong(event){
		$("#pause").hide();
		$("#play").show();
		$("#audioplayer").trigger("pause");
	}

	function playSong(event){
		$("#play").hide();
		$("#pause").show();
		$("#audioplayer").trigger("play");
	}

	function previousSong(){
		alert("Previous song not implemented yet.");
	}

})();