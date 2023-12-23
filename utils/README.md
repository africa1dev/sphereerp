# Utils (Utilities)

Helper classes and functions to speed up coding of custom functions when developing with [Sphere ERP](https://www.sphereerp.com)

These functions are automatically imported into the codespace of custom code and only need to be called.

## 1. Database connection (db)
Connect to your instance of the Sphere ERP database from custom code. The primary database is a MariaDB instance. 
This class can also be used to connect to any other MariaDB/Mysql databases.

### Usage

#### Connect to primary database
```php
$db=new sphereerp\utils\db();
```

#### Connect to other database
```php
$db=new sphereerp\utils\db(string <username>,string <password>,string <host>,string <character set>,string <database>);
```

#### Database connection status
The status of a database connection can be obtained from the handle property of the object returned by calling the sphereerp\utils\db class which has the keys:
```php
['conn'=><a PDO connection object>,'connected'=><true OR false>,'message'=><error message from connection attempt>]
```
#### Run a query on connected database
```php
$db-run(string <parametized query string>,array <query parameters>,string optional <database to use>);
```
Returns an array in the form:
```php
['result'=><a PDO statement object OR false>,'row_count'=><number of affected/returned rows OR false>,'error'=><error message from the query or false>]
```
#### Extract results from query
```php
$db->fetch($db-run(...)['result'],string <what to return>,<type to return>)
```
Second parameter can be:
1=Return only one row as an array, 'col' return only one column as a string, 'all' return all rows as an array

Third parameter can be any PDO return constant as below:
```php
PDO::FETCH_NUM, PDO::FETCH_BOTH, PDO::FETCH_OBJ, PDO::FETCH_LAZY, PDO::FETCH_ASSOC, PDO::FETCH_COLUMN, PDO::FETCH_KEY_PAIR, PDO::FETCH_UNIQUE, PDO::FETCH_GROUP
```
Information on these PDO constants is available on the [PHP documentation](https://www.php.net/manual/en/pdostatement.fetch.php)
