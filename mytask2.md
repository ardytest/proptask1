Task 2
======

test.html
---------
- inconsistent tag names, all of them should be in lowercase
- move js script above the closing tag of body
- use function  jquery's function onload
- script tag and div should be inside the body tag
- use css instead of using center tag and font tag
- change Infodiv to id and make it lowercase
- don't leave an empty script tag
- about the comment `<!--// Get the data using ajax //-->`: use `//` or `/**/` to comment
- no need to use `http://www.facebook.com/2008/fbml`
- div element #fb-root is never used
- use the HTML5 doctype instead of HTML 4.01 DTD
- missing title and meta tags
- in $.get(), need to parse/format the json data before injecting it to the template

getinfo.php
-----------
- use require instead of require_once
- inconsistent variable naming convention - change ArrayURL variable name start with lowercase
- extra ')' in line 4 - `$ArrayURL = split('/', $_SERVER[REQUEST_URI]));`
- change '=' to '==' line 13 - `if (is_object($data) = true) $status = '200 OK';` - and can be removed coz it's not being used
- use trim in line 4: `$ArrayURL = split('/', trim($_SERVER[REQUEST_URI], '/'));`
- should be `echo json_encode($data->getAll());` instead of `return json_encode($data->getAll());`
- change `$status_header = 'HTTP/1.1 $status';` to `$status_header = 'Content-type: application/json';`

data.php
--------
- change baseObj to dataObj
- use PHP PDO instead of php's mysql functions
- move the mysql access credentials into a separate config.php file and define them as constants
- dataObj::$mysql should be private
- pass the table name into the constructor and store it in (protected) `dataObj::$table` - use `$this->table` in `get()` and `getAll()` methods
- remove the space between the method name and the parenthesis e.g. `public function __construct ($table)`
- $table must be protected in propertyData, hdbData, hdbData and dataObj
- no need to pass $id to `getAll()`
- the methods under propertyData and hdbData class, shouldn't be in one line
- don't initialize $table in the propertyData, hdbData and condoData class. initialize it in the parent's constructor .e.g:

	class propertyData extends dataObj {

	    public function __construct($table = 'Property')
	    {
	        parent::__construct($table);
	    }

	class hdbData extends propertyData {

	    public function __construct()
	    {
	        parent::__construct('HDB');
	    }

- some initialized properties under propertyData are not being used
- inconsistent variable naming convention (some all uppercase, some lowercase, etc.)
- propertyData::getTitle() returns uninitialized $Type instead of title
- propertyData::$hdbblock should be under hdbData class
- table field names like 'Living_room', 'Type','Title' should be stored as class constants
- propertyData::$swimmingpool is never used
- condoData::gotSwimmingPool - should be condoData::getSwimmingPool
- need to map propertyData::$Type to its corresponding property type string
- class names must be in StudlyCaps

data.sql
--------
- CREATE TABLE Property - change Engine to InnoDB, foreign keys don't work with MyISAM
- CREATE TABLE Condo - PID should be BIGINT. foreign key and the field it references to should have the same type
- database,tables, and field names should be in lowercase