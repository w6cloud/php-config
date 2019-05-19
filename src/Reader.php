<?php

namespace W6\Config;

class Reader {

    /**
     * Configuration storage
     * (named __DATA__ to avoid conflicts with actual configuration keys)
     */
    protected $__DATA__ = array();

    /**
     * Constructor
     * @param string $path Path to the configuration file
     */
    public function __construct( string $path ){
        if( !file_exists($path) ){
            throw new \Exception( "File `$path` not found." );
        }
        if( !is_readable($path) ){
            throw new \Exception( "File `$path` is not readable." );
        }
        $this->__DATA__ = include( $path );
    }

    /**
     * Getter
     */
    public function __get( string $key ){
        if( array_key_exists($key, $this->__DATA__) ){
            return $this->__DATA__[$key];
        }
        throw new \Exception( "Key `$key` not found in configuration file `$path`." );
    }

}

