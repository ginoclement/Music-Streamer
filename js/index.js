"use strict";

(function(){
	
	window.onload = function (){
		var songs = document.getElementsByTagName("dd");
		for (var i = 0; i < songs.length; i++) {
			songs[i].addEventListener("click", songClick);
			// songs[i].addEventListener("mouseover", songBig);
			// songs[i].addEventListener("mouseout", songSmall);
			// songs[i].style.fontSize = "20px";
		};
	};

	function songClick(event){
		var playdiv = document.getElementById("player");
		playdiv.innerHTML = '<audio controls autoplay><source src="' + event.target.innerHTML + '" type="audio/mpeg"></audio>';
	}

	function songBig(event){
		event.target.style.fontSize = "64px";
	}

	function songSmall(){
		event.target.style.fontSize = "20px";
	}

})();