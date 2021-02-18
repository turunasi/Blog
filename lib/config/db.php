<?php
require_once('config.php');

class db(){

    protected $connect;

    public function __construct() {

        $string = ' host='.DB_HOST.
                  ' port='.DB_PORT.
                  ' dbname='.DB_NAME.
                  ' user='.DB_USER.
                  ' password='DB_PASSWORD;
        $this->connect = pg_connect($string);
    }

    protected function getDetail($table, $id) {
        $result = pg_query_params($this->connect, 'SELECT * FROM $1 WHERE dflg = 0 AND id = $2', [$table, $id]);
        return pg_fetch_row($result, 1);
    }

    protected function getAll($table) {
        $result = pg_query_params($this->connect, 'SELECT * FROM $1 WHERE dflg = 0 ', [$table]);
        return pg_fetch_all($result);
    }

    protected function getAllinLimitedNum($table, $whereSQL = '', $from = 0, $recordPerPage = RECORD_NUM) {
        $result = pg_query_params($this->connect, 'SELECT * FROM $1 WHERE dflg = 0 $2', [$table, $whereSQL]);
        return pg_fetch_all($result);
    }

    protected function getNum($table, $whereSQL = '') {
        $result = pg_query_params($this->connect, 'SELECT * FROM $1 WHERE dflg = 0 $2', [$table, $whereSQL]);
        return pg_num_rows($result);
    }

}