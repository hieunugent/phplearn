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
     
# OOP Traits
- PHP only supports single inheritance: a child class can inherit only from one single parent.
- what if a class needs to inherit multiple behaviors? OOP traits solve this problem.
- Traits are used to declare methods that can be used in multiple classes. 
- traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public, private, or protected).
- using trait keyword
# OOP - Static Methods
- Static methods can be called directly - without creating an instance of the class first.
- A class can have both static and non-static methods. A static method can be accessed from a method in the same class using the self keyword and double colon (::):
- Static methods can also be called from methods in other classes. To do this, the static method should be public:
- To call a static method from a child class, use the parent keyword inside the child class. Here, the static method can be public or protected.
# OOP - Static Properties
- Static properties can be called directly - without creating an instance of a class.
- Static properties are declared with the static keyword:
- A class can have both static and non-static properties. A static property can be accessed from a method in the same class using the self keyword and double colon (::):
- To call a static property from a child class, use the parent keyword inside the child class:
# PHP Namespaces
- Namespaces are qualifiers that solve two different problems:
  - They allow for better organization by grouping classes that work together to perform a task
  - They allow the same name to be used for more than one class
- For example, you may have a set of classes which describe an HTML table, such as Table, Row and Cell while also having another set of classes to describe furniture, such as Table, Chair and Bed. Namespaces can be used to organize the classes into two different groups while also preventing the two classes Table and Table from being mixed up.
- Any code that follows a namespace declaration is operating inside the namespace, so classes that belong to the namespace can be instantiated without any qualifiers. To access classes from outside a namespace, the class needs to have the namespace attached to it.
- Namespaces are declared at the beginning of a file using the namespace keyword: # PHP Iterables 
- An iterable is any value which can be looped through with a foreach() loop.
- The iterable pseudo-type was introduced in PHP 7.1, and it can be used as a data type for function arguments and function return values.
- The iterable keyword can be used as a data type of a function argument or as the return type of a function:
# MYSQL:
- need to create an user and password
- set path of mysql in terminal so it can access any where
- using the MYSQL syntax to access the data
# XML
- The XML language is a way to structure data for sharing across websites.
- Several web technologies like RSS Feeds and Podcasts are written in XML.
- XML is easy to create. It looks a lot like HTML, except that you make up your own tags.
- considering the xmlfile as a tree, access each tag like a node.
## What is an XML Parser?
- To read and update, create and manipulate an XML document, you will need an XML parser.
- In PHP there are two major types of XML parsers:
    - Tree-Based Parsers
    - Event-Based Parsers
## Tree-Based Parsers
- Tree-based parsers holds the entire document in Memory and transforms the XML document into a Tree structure. It analyzes the whole document, and provides access to the Tree elements (DOM).
- This type of parser is a better option for smaller XML documents, but not for large XML document as it causes major performance issues.
- tree-based parsers: SimpleXML, DOM
## Event-Based Parsers
- Event-based parsers do not hold the entire document in Memory, instead, they read in one node at a time and allow you to interact with in real time. Once you move onto the next node, the old one is thrown away.
- This type of parser is well suited for large XML documents. It parses faster and consumes less memory.
- Example of event-based parsers:
    - XMLReader
    - XML Expat Parser
## The SimpleXML Parser
- SimpleXML is a tree-based parser.
- SimpleXML provides an easy way of getting an element's name, attributes and textual content if you know the XML document's structure or layout.

- SimpleXML turns an XML document into a data structure you can iterate through like a collection of arrays and objects.

- Compared to DOM or the Expat parser, SimpleXML takes a fewer lines of code to read text data from an element.
- The PHP simplexml_load_string() function is used to read XML data from a string.
## XML Expat Parser
- The built-in XML Expat Parser makes it possible to process XML documents in PHP.
# What is AJAX?
- Ajax js asynchronous js and xml
- AjAx is a technique for creating fast and dynamic web pages.
- AJAX allows web pages to be updated asynchronously by exchanging small amounts of data with the server behind the scenes. This means that it is possible to update parts of a web page, without reloading the whole page.
# AJAX is Based on Internet Standards
- XMLHttpRequest object (to exchange data asynchronously with a server)
- JavaScript/DOM (to display/interact with the information)
- CSS (to style the data)
- XML (often used as the format for transferring data)