<?php
	/*
		Gino Clement
		Created: 5/9/2014
		
		This file imports the music in a given XML file into the database

		Notes:
			Probably want to limit access to this file.
	*/

	//Create database object
	// $db = new PDO("mysql:dbname=DATABASE;host=127.0.0.1", "USERNAME", "PASSWORD");
	//Set error reporting
	// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Processes a query
	function query($query){
		$q = $db->prepare("$query");
		$q->execute();
		return $q->fetchAll();
	}

	$xml = simplexml_load_file("Library.xml", "SimpleXMLElement", LIBXML_DTDLOAD);
	// $temp = $xml->dict->dict->dict;
	// print_r($xml);
	$temp = $xml->dict->dict->dict;
	// print_r($temp);

	// foreach ($xml->key as $k) {
	// 	print_r($k);
	// }

	foreach ($temp as $track) {
		print_r($track->getChildren());
	}


?>