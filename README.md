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
- the throw statement allows a user defined fucntion or method to throw an exception.
- When an exception is thrown, the code following it will be not executed.
# Contructor : 
- this allows you to "initialize" an object's properties upon creation of the object
- if you create a __construct() function, PHP will automatically call this function when  you create an object from a class
- start with two underscore
# Destructor : 
- this is call when the object is destructed or the script is stopped or exited
- that is automatically called at the end of the script
# Access Modifiers: 
- Properties and methods can have access modifiers which controling where they can be accessed
- There are three access modifiers: 
    - public - the property or method can be accessed from everywhere. This is default
    - protected - the property or method can be accessed within the class and by classes derived from that class
    - private - the property or method can ONLY be accessed within the class
# PHP What is Inheritance : 
- when a class derives from another class
- using key words extends keyword
- inheritance and the protected Access Modifier 
    - properties or methods can be accessed within the class and by classes derived from that class.
- Overriding Inherited Methods
    - Inherited methods can be overridden by redefining the methods (use the same name) in the child class.
- The final Keyword : 
    - keyword can be used to prevent class inheritance or to prevent method overriding.
# Class Constants: 
- Class constants can be useful if you need to define some constant data within a class.
- A class constant is declared inside a class with the const keyword.
- We can access a constant from outside the class by using the class name followed by the scope resolution operator (::) followed by the constant name.
# Abstract Classes name : 
- Abstract classes and methods are when the parent class has a named method, but need its child class(es) to fill out the tasks.
# OPP interfaces:
- interfaces allow you to specify what methods a class should implement
- Interfaces make it easy to use a variety of different classes in the same way.When one or more classes use the same interface, it is referred to as "polymorphism".
# Interfaces vs. Abstract Classes
- The difference between interfaces and abstract classes are:
    - Interfaces cannot have properties, while abstract classes can
    - All interface methods must be public, while abstract class methods is public or protected
    - All methods in an interface are abstract, so they cannot be implemented in code and the abstract keyword is not necessary
    - Classes can implement an interface while inheriting from another class at the same time