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

###odOrEven()###
	Function to estimate if a number is odd or even.
	Takes 1 parameter, the actual number.
	Returns 0 of the number is odd.
	Return 1 if the number is even

######


