<!DOCTYPE html>
<html>
	<head>
		<!--
		Gino Clement
		Created: 4/27/2014
		Last Modified: 4/28/2014

		NOTES:
			-Not currently using the subnet mask except for in debug
			-Will display debug information if the GET parameter "debug" is set
			-Need to switch the play button glyphicon on pause and vice versa
			-Clicking a nav bar link doesn't select it
		-->
		<?php

			//Constants
			define("directory", "Music");		//Directory to use for crawling
			define("allowremote", False);		//Whether to allow IP addresses outside of the server's subnet

			//Need to implement checking the IP addresses
			//using the subnet mask.
			define("mask", "255.255.255.0");

			//Check to see if on the same subnet
			$Server_IP = $_SERVER['SERVER_ADDR'];
			$Client_IP = $_SERVER['REMOTE_ADDR'];

			//Debugging information
			if(isset($_GET["debug"])){
				//Show debug information
				$debug_info = array(
					"Server IP" => $_SERVER['SERVER_ADDR'],
					"Client IP" => $_SERVER['REMOTE_ADDR'],
					"Subnet Mask" => mask
				);

				//Start printing info
				?>
				<div id="debug">
					<dt>Debug Information</dt>
					<dl>
				<?php
				foreach($debug_info as $key => $value){ ?>
					<dd><?= $key . " => " . $value ?></dd>
				<?php } ?>
					</dl>
				</div>
				<?php
			}

			//Working on IP checking later for now just calling a function
			// if($Client_IP != "192.168.1.1"){
			// 	die("This page cannot be viewed remotely");
			// }

			/*
			if($Client_IP == "192.168.1.1"){
				//Allowing remote addresses

				//Temporary IP check hack
				// $Server_IP = substr(, 0)$Server_IP

				if(){
					//On an allowed subnet
				} else {
					//Not allowed on th
					die("Service not allowed from remote IP: " . $Client_IP);
				}
			} else {
				//Accessing from a remote subnet not allowed
				die("Service not allowed from remote IP addresses");
			}
			*/

				//Scans a given directory, prints files, and recursively searches directories
				function scan_dir($dir){
					//Get files in the directory
					$files = scandir($dir);

					//Iterate over files
					foreach ($files as $file) {
						if($file != "." && $file != ".."){
							$path = $dir . "/" . $file;
							if(is_dir($path)){
								//If it's a directory, recurse again
								scan_dir($path);
							} else {
								//Otherwise it's a file
								printsong($path);
							}
						}
					}
				}

				function printsong($path){
					?>
						<dd><?= $path ?></dd>
					<?php
				}

		?>
		<title>Streamer</title>
		<meta charset="utf-8" />
		<!-- Scripts 
			Note: 
				jQuery has to be imported before Boostrap and player.js
		-->
		<script src="js/video.js" type="text/javascript"></script>
		<!-- <script src="js/index.js" type="text/javascript"></script> -->
		<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script> 
		<script src="js/player.js" type="text/javascript"></script>
		<!-- CSS -->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="css/index.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Begin the fixed navigation bar at top -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
          			</button>
					<a class="navbar-brand" href="#">Streamer</a>
				</div>
				<div class="navbar-collapse collapse">
					<!-- Navigation bar left -->
		            <ul class="nav navbar-nav">
		            	<li class="active"><a href="#">Playlists</a></li>
						<li><a href="#Artists">Artists</a></li>
	                	<li><a href="#Albums">Albums</a></li>
	                	<li><a href="#Songs">Songs</a></li>
	                	<li><a href="#Genres">Genres</a></li>
			            <li class="dropdown">
			              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
		                	<ul class="dropdown-menu">
			            	    <li><a href="#">Action</a></li>
			                	<li><a href="#">Another action</a></li>
			          		    <li><a href="#">Something else here</a></li>
			                    <li class="divider"></li>
			                    <li class="dropdown-header">Nav header</li>
			                  	<li><a href="#">Separated link</a></li>
				                <li><a href="#">One more separated link</a></li>
			                </ul>
	 	              	</li>
		            </ul>
		            <!-- Navigation bar right -->
		            <div class="nav navbar-nav navbar-right">
		            	<!-- Add to favorites/playlist button -->
		            	<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-star"></span></button>
		            	<!-- Begin music control buttons -->
		            	<div class="btn-group btn-group-lg">
  							<button id="previous" type="button" class="btn btn-default"><span class="glyphicon glyphicon-step-backward"></span></button>
 							<button id="play" type="button" class="btn btn-default"><span class="glyphicon glyphicon-play"></span></button>
 							<button id="pause" type="button" class="btn btn-default"><span class="glyphicon glyphicon-pause"></span></button>
 							<button id="next" type="button" class="btn btn-default"><span class="glyphicon glyphicon-step-forward"></span></button>
						</div>
		            	<!-- End music control buttons -->
		            	<button id="settings" type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-cog"></span></button>
		            </div>
		        </div>
        	</div>
		</nav>
		<!-- End the fixed navigation bar at top -->
		<!-- Begin main section of the page -->
		<div class="container">
			<div id="Playlists">
				<p>Playlists Section</p>
			</div>
			<div id="Artists">
				<p>Artists Section</p>
			</div>
	    	<div id="player">
	    		<audio id="audioplayer" controls autoplay>
	    			<source src="" type="audio/mpeg">
	    			No song selected yet.
	    		</audio>
	    	</div>
			<div id="filelist" class="container">
				<a href="demo.html">Video Test</a><br />
				<p>Server IP Address: <?= $Server_IP ?></p>
				<p>Your IP Address: <?= $Client_IP ?></p>
				<br />
			<?php
				$files = glob(directory . "*");

				//Code will need to be moved to inside the IP checking
				?>
				<div id="filelist" class="container">
					<dt>List of files</dt>
					<dl>
				<?php
					scan_dir(directory);
				?>
					</dl>
				</div>
				<?php

			?>
			</div>
		</div>
		<!-- End main section of the page -->
	</body>
</html>