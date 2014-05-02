<?php
	/*
		Gino Clement
		Created: 4/28/2014

		This file is a service that performs functions related to artists.
		Server responses are done with JSON.

		Notes:
			SQL queries will likely change when I build the database



			GET Parameters
				list
					album
						artist
					artist
				render
					if the client wants code generated, this should be set
				


	*/

	//Need to access the database
	// include("db.php");

	if(isset($_GET["list"])){
		// header("Content-type: application/json");

		//Get the value of the list parameter
		$list_ = $_GET["list"];

		if($list_ == "album"){
			if(isset($_GET["artist"])){
				//Only reply with albums by a specific artist
				getAlbumsByArtist();
			} else {
				//List all albums
				getAlbums();
			}
			
		} else if($list_ = "artist"){
			//This stuff is just here temporarily to get a response

			$q = array("Metallica", "A Day To Remember", "All That Remains", "In This Moment", "Amaranthe");
			sort($q);
			print json_encode($q);

			// print json_encode(getArtists());
		} else if($list_ == "songs"){

		}
	} else if(isset($_GET["render"])){
		header("Content-type: text/html");
	} else {
		//No parameters have been set
		header("HTTP/1.1 400 Invalid Request");
  		die("An HTTP error 400 (invalid request) occurred.");
	}



?>