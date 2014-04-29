<!DOCTYPE html>
<html>
	<head>
		<!--
		Gino Clement
		Created: 4/27/2014

		NOTES:
			Not currently using the subnet mask except for in debug
			
			Will display debug information if the GET parameter "debug" is set
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

				//Scans a given directory, calls import for files, and recursively searches directories
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

				function printsong($path){ ?>
					<dd><?= $path ?></dd>
					<!-- <p><iframe src="<?= $path ?>"></iframe></p> -->
				<?php }

		?>
		<title>Streamer</title>
		<meta charset="utf-8" />
		<script src="video-js/video.js" type="text/javascript"></script>
		<script src="index.js" type="text/javascript"></script>
		<link href="index.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="filelist">
			<a href="demo.html">Video Test</a><br />
			<p>Server IP Address: <?= $Server_IP ?></p>
			<p>Your IP Address: <?= $Client_IP ?></p>
			<div id="playdiv">
				<audio controls autoplay>
					<source src="" type="audio/mpeg">
				</audio>
			</div>
			<br />
		<?php
			$files = glob(directory . "*");

			//Code will need to be moved to inside the IP checking
			?>
			<div id="filelist">
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
	</body>
</html>