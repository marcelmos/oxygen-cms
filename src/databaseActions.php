<?php

class oxdb{
    private $conn;

    function __construct(){
        // CONNECT TO DATABASE
        $data = include(__DIR__ . '/config.php');
        $this->conn = new mysqli($data['host'], $data['username'], $data['password'], $data['database']);
    }

    function __destruct(){
        // CLOSE DATABASE CONNECTION
        $this->conn->close();
    }

    public function select(string $table_name, array $query_data = NULL, array $where_query = NULL){
        $sql = "SELECT ".($query_data ? implode(", ", $query_data) : "*")." FROM $table_name ".($where_query? "WHERE ".array_keys($where_query)." = ".implode($where_query) : "");

        /*
        Need to add 'foreach' loop for iterate all array keys
        and values for key in correct way and inserted syntax

        WORKING:
        Require only some advanced logic and other instrictions
        like auto data display e.g.
        */


        print_r($this->conn->query($sql));
        // print_r($sql);
    }

    public function insert(string $table_name, array $query_data){
        $sql = "INSERT INTO $table_name (".($query_data ? implode(", ", array_keys($query_data)) : '').") VALUES (".implode(", ", $query_data).")";
        print_r($sql);
    }

    public function update(string $table_name, array $query_data, array $where_query = NULL){

        $sql = "UPDATE  $table_name SET ".array_keys($query_data)." = ".$query_data[array_keys($query_data)];

        /*
        Need to add 'foreach' loop for iterate all array keys
        and values for key in correct way and inserted syntax
        */

        print_r($sql);
    }

    public function delete(string $table_name, array $query_data){
        $sql = "DELETE FROM $table_name WHERE ".array_keys($query_data)." = ".$query_data[array_keys($query_data)];
        print_r($sql);
    }

    public function query(string $sql){
        mysqli_query($this->conn, $sql);
    }


}