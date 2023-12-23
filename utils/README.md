# Utils (Utilities)

Helper classes and functions to speed up coding of custom functions when developing with [Sphere ERP](https://www.sphereerp.com)

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
