<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type');
define ("TRIMIFY", "trimmify.php");
//define ("SEARCHENGINE", "functions.php");
define ("PATTERN", "pattern.php");
require_once(TRIMIFY);
//require_once(SEARCHENGINE);
require_once(PATTERN);
?>