<?php

class Database
{
    protected $db;
    public function __construct()
    {
        try {
            // PDO Initialize
            $this->db = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        } catch (Exception $e) {
            // PDO Exception
            die($e->getMessage());
        }
    }
}
