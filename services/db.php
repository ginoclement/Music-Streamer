<?php
	/*
		Gino Clement
		Created: 4/26/2014
		
		This file provides support for working with a MySQL database,
		allowing its functions to be called to reduce redundancy

		Notes:
			Need to add database, username, and password for database

	*/

	//Create database object
	$db = new PDO("mysql:dbname=DATABASE;host=127.0.0.1", "USERNAME", "PASSWORD");
	//Set error reporting
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Processes a query
	function query($query){
		$q = $db->prepare("$query");
		$q->execute();
		return $q->fetchAll();
	}

	/***********************************************************************************
	*Queries
	*This section
	************************************************************************************/

	//Gets albums for a given artist
	function getAlbumsByArtist($artist){
		$q = "SELECT AlbumName, AlbumArtLocation
				FROM Albums al
				JOIN ArtistSongAlbumBridge b ON al.AlbumID=b.AlbumID
				JOIN Artist ar on b.ArtistID=ar.ArtistID
				WHERE ar.ArtistName=$artist;";
		return query($q);
	}

	//Returns an array of all artists
	function getArtists(){
		// $q = "SELECT DISTINCT ArtistName FROM Artist;";

		$q = array("Metallica", "A Day To Remember", "All That Remains", "In This Moment", "Amaranthe");
		sort($q);
		return $q;
		// return query($q);
	}

	//Returns an array of songs in a given album
	function getSongsByAlbum($album){
		$q = "SELECT SongName, Duration, NumberOfPlays
				FROM Songs s
				JOIN ArtistSongAlbumBridge b ON s.SongID=b.SongID
				JOIN Album al on b.ArtistID=al.AlbumID
				WHERE al.AlbumName=$album\;";
		return query($q);
	}

	//Returns an array of songs that are by a given artist
	function getSongsByArtist($artist){
		$q = "SELECT SongName, Duration, NumberOfPlays
				FROM Songs s
				JOIN ArtistSongAlbumBridge b ON s.SongID=b.SongID
				JOIN Artist ar on b.ArtistID=ar.ArtistID
				WHERE ar.ArtistName=$artist\;";
		return query($q);
	}

	// //Return information about the given song
	// function songInfo($SongID){

	// }
?>