# phplearn
# data type 
- String, integer, Float , Boolean , Array, Object, NUlll Resource
# String 
- strlen() return the length of a string
- str_word_count() - function counts the number of words in a string
- strrev() fuction reverses a string
- strpos() search the specific text within a string return boolean False if no match else return the pos 
- str_replace() replace some characters with some other characters in a string
# operator 
== equal 
=== identical
!= not equal
!== not identical
<=> space ship lessthan -1 equal 0 greater +1
# Regular Expression
preg_match() return match (1) or not (0)
preg_match_all() number of time match 
preg_replace() 
# PHP Include Files
- require will produce a fatal error and stop the script (E_COMPILE_ERROR)
- include will only produce a warning (E_WARNING) and the script will continue
include 'filename';
require 'filename';
# readfile() function : 
# PHP openfile 
- fopen(): 
- fread() : read from an open file
- fclose() : close an open file
- fgets() : is used to read a single line from a file
- feof() : function checks if the end of file  has been reached
- fgetc() : is used to read a single character from a file
# Filter :
- FILTER_SANITIZER_STRING
- FILTER_SANITIZER_EMAIL
- FILTER_VALIDATE_INT/STRING/EMAIL/IP
- FILTER_FLAG_STRIP_HIGH
- FILTER_FLAG_QUERY_REQUIRED
- FILTER_FLAG_IPV6
# CALL BACK FUNCTION
- a function that passed as an argument into another function
# Json Encode and Decode
- JSON stands for JavaScript Object Notation, and is a syntax for storing and exchanging data.
- Since the JSON format is a text-based format, it can easily be sent to and from a server, and used as a data format by any programming language.
# exception:
- the throw statement allows  a user defined fucntion or method to throw an exception.
- When an exception is thrown, the code following it will be not executed.