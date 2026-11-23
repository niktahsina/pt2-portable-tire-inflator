<?php

// Get the host name (e.g. localhost or lrgs.ftsm.ukm.my)
$host = $_SERVER['HTTP_HOST'];

// Get the current script path (e.g. /pt2/index.php)
$scriptPath = $_SERVER['SCRIPT_NAME'];

// Get only the file name from the script (e.g. index.php)
$fileName = basename($scriptPath);

// Remove the file name from the script path (e.g. /pt2/)
$directoryPath = str_replace($fileName, "", $scriptPath);

// Combine everything into a full base URL (e.g. http://localhost/pt2/)
$baseUrl = "http://" . $host . $directoryPath;

// Define it as a constant so you can use BASE_URL anywhere
define('BASE_URL', $baseUrl);