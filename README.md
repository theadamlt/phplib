PHP Library containing functions that i use regularly.

This is free and unencumbered software released into the public domain.

Anyone is free to copy, modify, publish, use, compile, sell, or
distribute this software, either in source code form or as a compiled
binary, for any purpose, commercial or non-commercial, and by any
means.

In jurisdictions that recognize copyright laws, the author or authors
of this software dedicate any and all copyright interest in the
software to the public domain. We make this dedication for the benefit
of the public at large and to the detriment of our heirs and
successors. We intend this dedication to be an overt act of
relinquishment in perpetuity of all present and future rights to this
software under copyright law.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.

For more information, please refer to <http://unlicense.org/>

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

