PHP Library containing functions that i use regularly.

###localhost_con()###
	The function will establish a MySQL connection to the database, passed in the arguments.
	It will use localhost as host, root as username and an empty password (default for xampp).
	Creates a global variable $con containing the connection.
	Creates a global variable $con_db containing the database selection.
	If any of those variables returns false, it will die(), echo an error-message and the mysql_error();

###mysql_con()###
	Function takes 4 arguments:
		('host', 'username', 'password', 'database name')
		Creates a global variable $con containing the connection.
		Creates a global variable $con_db containing the database selection.
		If any of those variables returns false, it will die(), echo an error-message and the mysql_error();

###odd_or_even()###
	Function to find out if a number is odd or even.
	Takes 1 parameter, the actual number.
	Returns 0 of the number is odd.
	Return 1 if the number is even

###detect_browser()###
	Functions takes 0 parameters.
	Return a string with the Browser name.
	If  browser notrecognized: Undefined.

###detect_mobile_browser()###
	Functions takes 0 parameters.
	Returns true if useragent is mobile.
	Else, returns false.

###calc_file_size()###
	Function takes 1 parameter, the filesize variable.
	Returns the filesize, in the suitable unit, up to Terabyte, with 1 decimal.

