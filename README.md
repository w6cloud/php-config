# WEB6 PHP Config

This class reads configuration values stored in a PHP file and makes them available as properties.

## Config file

The configuration file is a simple PHP file. This allows you to build your configuration dynamically and is easy to document.

```php
<?php
$conf = array();

/**
 * SECTION : ENVIRONMENT 
 * Defines the environment
 * Possible choices :
 * - development
 * - production
 */
$conf['environment'] = 'development';

/**
 * SECTION : DEBUG 
 * Debugging options
 */
$conf['debug'] = array();

    /**
     * Debug level
     * 0 - No messages
     * 1 - Show messages
     * 2 - Show messages + backtrace
     */
    $conf['debug']['level'] = $conf['environment'] == 'development' ? 2 : 0;

// Important, return the configuration array
return $conf;
```

## Read config

```php
var $c = new \web6\config\Config('/path/to/config.php');
echo $config->debug['level'];
```
