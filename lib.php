<?php

//Define Environment
define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

function mysql_con ($host, $user, $password, $dbname)	{
	global $con;
	$con = mysql_connect($host, $user, $password);
	if (!$con)	{
		die ("Could not connect to MySQL database ".mysql_error());
	}

	global $con_db;
	$con_db = mysql_select_db($dbname, $con);
	if (!$con_db) {
		die ("Could not select database ".$dbname." ".mysql_error());
	}

}

function localhost_con ($dbname) {
	global $con;
	$con = mysql_connect("localhost", "root", "");
		if (!$con)	{
		die ("Could not connect to MySQL database ".mysql_error());
	}
	global $con_db;
	$con_db = mysql_select_db($dbname,$con);
		if (!$con_db) {
		die ("Could not select database ".$dbname." ".mysql_error());
	}
}
?>