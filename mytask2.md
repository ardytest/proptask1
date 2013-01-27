Task 2
======

test.html
---------
- Inconsistent tag names, all of them should be in lowercase
- Move js script above the closing tag of body
- Use function  jquery's function onload
- Script tag and div should be inside the body tag
- Use css instead of using center tag and font tag
- Change Infodiv to id and make it lowercase
- Don't leave an empty script tag
- About the comment `<!--// Get the data using ajax //-->`: use `//` or `/**/` to comment
- No need to use `http://www.facebook.com/2008/fbml`
- Div element #fb-root is never used
- Use the HTML5 doctype instead of HTML 4.01 DTD
- Missing title and meta tags, they should be there
- In `$.get()`, need to parse/format the json data before injecting it to the template

getinfo.php
-----------
- Use require instead of require_once
- Inconsistent variable naming convention - change the `$ArrayURL` variable name. ideally should start with lowercase
- Extra ')' in line 4 - `$ArrayURL = split('/', $_SERVER[REQUEST_URI]));`
- Change '=' to '==' line 13 - `if (is_object($data) = true) $status = '200 OK';` - and can be removed coz it's not being used
- Use trim in line 4: `$ArrayURL = split('/', trim($_SERVER[REQUEST_URI], '/'));`
- Should be `echo json_encode($data->getAll());` instead of `return json_encode($data->getAll());`
- Change `$status_header = 'HTTP/1.1 $status';` to `$status_header = 'Content-type: application/json';`

data.php
--------
- Change baseObj to dataObj
- Use PHP PDO instead of php's mysql functions
- Move the mysql access credentials into a separate config.php file and define them as constants
- DataObj::$mysql should be private
- Pass the table name into the constructor and store it in (protected) `dataObj::$table` - Use `$this->table` in `get()` and `getAll()` methods
- Remove the space between the method name and the parenthesis e.g. `public function __construct ($table)`
- $table must be protected in propertyData, hdbData, hdbData and dataObj
- No need to pass $id to `getAll()`
- The methods under propertyData and hdbData class, shouldn't be in one line
- Don't initialize $table in the propertyData, hdbData and condoData class. initialize it in the parent's constructor .e.g:

	class propertyData extends dataObj
	{

	    public function __construct($table = 'Property')
	    {
	        parent::__construct($table);
	    }
	}

	class hdbData extends propertyData
	{

	    public function __construct()
	    {
	        parent::__construct('HDB');
	    }
	}

- Some initialized properties under propertyData are not being used
- Inconsistent variable naming convention (some all uppercase, some lowercase, etc.), ideally should be camelCase
- PropertyData::getTitle() returns uninitialized $Type instead of $Title
- PropertyData::$hdbblock should be under hdbData class
- Table field names like 'Living_room', 'Type','Title' should be stored as class constants
- PropertyData::$swimmingpool is never used
- CondoData::gotSwimmingPool - Should be condoData::getSwimmingPool
- Need to map propertyData::$Type to its corresponding property type string
- Class names must be in StudlyCaps

data.sql
--------
- CREATE TABLE Property - Change Engine to InnoDB, foreign keys don't work with MyISAM
- CREATE TABLE Condo - PID should be BIGINT. foreign key and the field it references to should have the same type
- Database, tables, and field names should be in lowercase