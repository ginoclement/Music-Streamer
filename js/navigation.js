"use strict";

(function(){
	/*	
		Gino Clement
		Created: 4/28/2014
		Last Modified: 4/28/2014

		This file controls the audio player in the page.

		Notes:

	*/
	window.addEventListener("load", function (){
		//Set a clicked navbar button as active
		$("ul.navbar-nav > li > a").click(navigate);

		$("#Playlists").bind("click", showplaylist);
		$("#newplaylist").bind("click", newplaylist);
	});

	function newplaylist(){
		alert("New playlist");
	}

	function showplaylist(){
		//Need want to make a modal display pop in from the left
		var playlist = $("#playlist");
		var navbar = $(".navbar-fixed-top");
		playlist.css("height",$(window).height());
		playlist.css("top",navbar.height());

		//Animate the playlist box in
		playlist.animate({left:"0px"});

	}

	function navigate(event){
		$("ul.navbar-nav > li").removeClass();
		$(this).parent().addClass('active');

		//If some other link is clicked, hide the playlist
		if(event.target.id != "Playlists"){
			$("#playlist").animate({left:"-250px"})
		}
	}

})();