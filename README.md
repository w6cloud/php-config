# WEB6 PHP Config

This class reads configuration values stored in a PHP file and makes them available as properties.

## Install

Install via Composer

```bash
$ composer require web6/config
```

## Usage

### Create a configuration file

Create a PHP file which will contain the configuration. This file must be readable by the server.

```php
<?php
// The configuration is stored in a simple PHP array
$config = array();
$config['title'] = 'Lorem Ipsum sit dolor amet';
// IMPORTANT : return the configuration!
return $config;
```

Using a PHP array for the configuration offers a lot of flexibility and a great readability. Some examples are loctaed at the end of this file.

### Configure autoload

Configure autoloading by including Composer's generated file :

```php
include_once('vendor/autoload.php');
```

### Read configuration

To read configuration values, instanciate the `web6\config\Reader` class with the configuration file path. 

```php
var $config = new \web6\config\Reader( '/path/to/config.php' );

print_r($config->environment);
print_r($config->debug);
print_r($config->debug['level']);
```


## Advanced configuration

Samples demonstrating the possibilities offered by PHP configuration.

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

/**
 * SECTION : USER 
 * Include other configuration files
 */
$conf['user'] = include( './config/user.php' );

// Important, return the configuration array
return $conf;
```