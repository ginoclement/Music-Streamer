<?php
	/*
		Gino Clement
		Created: 4/28/2014

		This file is a service that performs functions related to playlists.
		Server responses are done with JSON.

		Notes:
			GET Parameters
				task
					create
						create a playlist
						may need to specify other parameters
							random
							artist
					retrieve
						get a playlist
				name
					playlist name
				random
				render
					if the client wants code generated, this should be set



	*/
	if(isset($_GET["render"])){
		header("Content-type: text/html");
	} else {
		header("Content-type: application/json");
	}

	function addSong($playlist, $song){

	}

	function createPlaylist($name){

	}

	function importPlaylist(){
		//Create a new playlist in the database

		//For each song in the file
			//Check to see if the song is in the database
				//If it's in the database
					//Add the song to the database
				//Else
					//Log an error

	}

	function importLibrary(){
		//Can import
	}
?>