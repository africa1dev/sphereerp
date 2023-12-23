# Utils (Utilities)

Helper classes and functions to speed up coding of custom functions when developing with [Sphere ERP](https://www.sphereerp.com)

## 1. Database connection (db)
Connect to your instance of the Sphere ERP database from custom code. The primary database is a MariaDB instance. 
This class can also be used to connect to any other MariaDB/Mysql databases.

### Usage
i. Connect to primary database
```php
$db=new sphereerp\utils\db();
```

ii: Connect to other database
```php
$db=new sphereerp\utils\db(string <username>,string <password>,string <host>,string <character set>,string <database>);
```
