<?php
 
try {
	$hostname = isset($_GET['host'])? $_GET['host'] : '';
	$port = isset($_GET['port'])? $_GET['port']: '';
	
	if (empty($hostname) || empty($port)) {
	    exit;   
	}
	printf(' ? Attempting to connect to: %s:%u', $hostname, $port);
	 
	if(!is_resource(@fsockopen($hostname, $port, $code, $message, 5))) {
		throw new RuntimeException($message, $code);
	}
	printf("\r:) Successfully connected to: %s:%u", $hostname, $port);
}
catch(Exception $e) {
	printf("\nError: %u - %s", $e->getCode(), $e->getMessage());
	exit(1);
}