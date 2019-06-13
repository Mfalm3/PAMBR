<?php

namespace Mfalm3\Database;

use Mfalm3\Debug\Logger;

class Writer
{
    public static function write($dbName, $msgArr)
    {
        try{
            (new DB($dbName))->insertDB($msgArr);
        }catch (\PDOException $e){
            Logger::log($e->getMessage());
        }
    }
}


