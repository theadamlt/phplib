<?php

/**
 * lib.php
 * @package library
 */

$salt1 = "/*5t12?";
$salt2 = "45¤¤5j";

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
 /**
 * Connects to a MySQL database
 * @param host {string} The hostmane of MySQL server
 * @param user {string} The username of the server
 * @param password {string} The password of the server
 * @param dbname {string} The database name
 * @return {array} An array containing the database connection variable and the database selection variable
 */
function mysql_con($host, $user, $password, $dbname)	{
	$con = mysql_connect($host, $user, $password);
	if (!$con)	{
		die ("Could not connect to MySQL database ".mysql_error());
	}
	$con_db = mysql_select_db($dbname, $con);
	if (!$con_db) {
		die ("Could not select database ".$dbname." ".mysql_error());
	}
	return array('con' => $con, 'con_db' => $con_db);
}

/**
* Connects to a MySQL database on localhost with the default MySQL root credentials
*@param dbname {string} The database name
*@return {array} An array containing the database connection variable and the database selection variable
*/
function localhost_con($dbname) {
	$con = mysql_connect("localhost", "root", "");
	if (!$con)	{
		die ("Could not connect to MySQL database ".mysql_error());
	}
	$con_db = mysql_select_db($dbname,$con);
	if (!$con_db) {
		die ("Could not select database ".$dbname." ".mysql_error());
	}

	return array('con' => $con, 'con_db' => $con_db);
}

/**
* Strips slashes and runs mysql_real_escape_string
*@param string {string} String to fix
*@return {string} The fixed string
*/
function mysql_fix_string($string)	{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return mysql_real_escape_string($string);
}

/**
* Runs mysql_fix_string and htmlentities
*@param string {string} String to fix
*@return {string} The fixed string
*/
function mysql_enteries_fix_string($string) {
	return htmlentities(mysql_fix_string($string));
}

/**
* Estimates whether a number is odd or even
*@param num {number} String to fix
*@return {Boolean} Returns True on even number, False on odd
*/
function odd_or_even($num)
{
	return ($num%2); // Returns 0 for odd and 1 for even
}

/**
* Detects if user runs one of the most common browsers
*@return {string} Returns the browser name. 'Undefined' for undefined
*/
function detect_browser()
{
	$useragent = $_SERVER['HTTP_USER_AGENT'];

	if(strpos($useragent, 'MSIE'))
		$browser = 'Internet explorer';

	elseif(strpos($useragent, 'Firefox'))
		$browser = 'Firefox';

	elseif(strpos($useragent, 'Chrome'))
		$browser = 'Google Chrome';

	elseif(strpos($useragent, 'Opera'))
		$browser = 'Opera';

	elseif(strpos($useragent, 'Safari'))
		$browser = 'Safari';

	elseif(strpos($useragent, 'SeaMonkey'))
		$browser = 'SeaMonkey';

	elseif(strpos($useragent, 'Flock'))
		$browser = 'Flock';

	elseif(strpos($useragent, 'Prism'))
		$browser = 'Prism';

	elseif(strpos($useragent, 'Deepnet Explorer'))
		$browser = 'Deepnet Explorer';

	elseif(strpos($useragent, 'Maxthon'))
		$browser = 'Maxthon';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Avant'))
		$browser = 'Avant';

	elseif(strpos($useragent, 'Camino'))
		$browser = 'Camino';

	elseif(strpos($useragent, 'Shiira'))
		$browser = 'Shiira';

	elseif(strpos($useragent, 'OmniWeb'))
		$browser = 'OmniWeb';

	elseif(strpos($useragent, 'iCab'))
		$browser = 'iCab';

	elseif(strpos($useragent, 'Stainless'))
		$browser = 'Stainless';

	elseif(strpos($useragent, 'Fluid'))
		$browser = 'Fluid';

	elseif(strpos($useragent, 'Konqueror'))
		$browser = 'Konqueror';

	elseif(strpos($useragent, 'Galeon'))
		$browser = 'Galeon';

	elseif(strpos($useragent, 'Epiphany'))
		$browser = 'Epiphany';

	elseif(strpos($useragent, 'Swiftfox'))
		$browser = 'Swiftfox';

	elseif(strpos($useragent, 'Swiftweasel'))
		$browser = 'Swiftweasel';

	else
		$browser = 'Undefined';

	return $browser;
}

/**
* Detects if user runs is on a cellphone
*@return {Boolean} Returns True if mobile browser, else false
*/
function detect_mobile_browser()
{
	return(preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$_SERVER['HTTP_USER_AGENT'])||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($_SERVER['HTTP_USER_AGENT'],0,4)));
}


/**
* Calculates file-size
*@param file {number} The number representing the file-size in bytes
*@return {string} Returns the file-size in the appropriate unit rounded to 1 decimal
*/
function calc_file_size($file)
{
	$kb = 1024;
	$mb = 1048576;
	$gb = 1073741824;
	$tb = 1099511627776;

	if($file >= $kb && $file < $mb) $size = round($file/$kb, 1).' KB';
	elseif($file >= $mb && $file < $gb) $size = round($file/$mb, 1).' MB';
	elseif($file >= $gb && $file < $tb) $size = round($file/$gb, 1).' GB';
	elseif($file >= $tb) $size = round($file/$tb, 1).'TB';
	else
	{
		$size = round($file, 1);
		if($size == 1) $size = $size.' Byte';
		else $size = $size.' Bytes';
	}
	return $size;
}


/**
* Converts number to roman numberer
*@param Number {number} The number to convert
*@return {string} The number converted to roman number
*/
function roman_numerals($num){
    $n = intval($num);
    $res = '';

    /*** roman_numerals array  ***/
    $roman_numerals = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1);

    foreach ($roman_numerals as $roman => $number){
        /*** divide to get  matches ***/
        $matches = intval($n / $number);

        /*** assign the roman char * $matches ***/
        $res .= str_repeat($roman, $matches);

        /*** substract from the number ***/
        $n = $n % $number;
    }

    /*** return the res ***/
    return $res;
}


/**
* Generates random string
*@param length {number} The length of the string
*@return {string} The random generated string
*/
function gen_random_string($len) {
	$symbols = array();
	$string = '';

	foreach (range('A', 'Z') as $value) {
		$symbols[] = $value;
	}

	foreach (range('a', 'z') as $value) {
		$symbols[] = $value;
	}

	foreach (range(1, 9) as $value) {
		$symbols[] = $value;
	}

	for ($i=0; $i < $len; $i++) { 
		$rand = rand(0, 60);
		$string .=$symbols[$rand];
	}

	return $string;

}


?>