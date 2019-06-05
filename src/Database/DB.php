<?php

namespace Mfalm3\Database;

class DB extends \SQLite3
{
    private $dir = __DIR__ . "../db/";
    private $db;
    private $dbName;

    public function __construct($fileName)
    {
        $this->dbName = $fileName;
    }

    public function initDB()
    {
        try
        {
            $this->open($this->dbName);

        }catch (\Exception $e)
        {
            die($e->getMessage());
        }
    }
}