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
					artist
				render
					if the client wants code generated, this should be set
				


	*/
	include("db.php");

	if(isset($_GET["list"])){
		// header("Content-type: application/json");

		//Get the value of the list parameter
		$list_ = $_GET["list"];

		if($list_ = "artist"){
			print json_encode(getArtists());
		}
	} else if(isset($_GET["render"])){
		header("Content-type: text/html");
	} else {
		//No parameters have been set
		header("HTTP/1.1 400 Invalid Request");
  		die("An HTTP error 400 (invalid request) occurred.");
	}



?>