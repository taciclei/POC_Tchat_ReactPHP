<?php

namespace Kernel;

class Database {
    static protected $_instance = null;
    protected $_db;

    static public function getInstance() {
        if( is_null(self::$_instance) )
            self::$_instance = new Database();
        return self::$_instance;
    }

    protected function __construct() {
        $this->_db = new \PDO(
            "mysql:host=db;dbname=tchat;charset=utf8",
            "root",
            "root"
        );
    }

    public function __call($method, array $arg) {
        return call_user_func_array(array($this->_db, $method), $arg);
    }



}



