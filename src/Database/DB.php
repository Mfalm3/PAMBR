<?php

namespace Mfalm3\Database;

use PDO;
use SQLite3;
use Mfalm3\Config\Config;
use Mfalm3\Debug\Logger;

class DB extends SQLite3
{
    protected $dir = Config::PATH_TO_DB;
    private $pdo;


    public function __construct($fileName)
    {
        try
        {
            Logger::log('Creating db file');

            $this->pdo = new PDO('sqlite:'.$this->dir.$fileName.'.sqlite');

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch (\PDOException $e)
        {
            Logger::log('error: '.$e->getMessage());
        }

        return $this->pdo;
    }


    public function __destruct()
    {
        $this->pdo = null;
        Logger::log('Closed DB resource');
    }

    public function initDB()
    {
        try
        {
            $create_table = "CREATE TABLE IF NOT EXISTS messages (
                                id INTEGER PRIMARY KEY AUTOINCREMENT, 
                                address TEXT,
                                date DATE,
                                type INTEGER,
                                subject TEXT,
                                body TEXT,
                                toa TEXT,
                                sc_toa TEXT,
                                service_number TEXT,
                                read INTEGER,
                                status INTEGER,
                                locked INTEGER,
                                date_sent DATE,
                                readable_date TEXT,
                                contact_name TEXT
                            );";

            $transaction = 'Set up tables';

            $this->transact($create_table, $transaction);

        }catch (\PDOException $e)
        {
            $this->pdo->rollback();
            Logger::log('ex: '.$e->getMessage());
        }

    }

    public function transact($query, $transaction)
    {
        Logger::log('Waiting to execute transaction');
        $this->pdo->beginTransaction();
        $this->pdo->exec($query);
//        $this->pdo->commit();
        Logger::log('Executed transaction : '.$transaction);
    }

    public function insertDB($msgArr)
    {
        Logger::log('Inserts into db');

        try {
            $insert = "INSERT INTO `messages` (
                        address, date, type, subject,
                        body, toa, sc_toa, service_number,
                        read, status, locked, date_sent,
                        readable_date, contact_name) VALUES (
                        :address, :date, :type, :subject,
                        :body, :toa, :sc_toa, :service_number,
                        :read, :status, :locked, :date_sent,
                        :readable_date, :contact_name);";


            $stmt = $this->pdo->prepare($insert);

            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':body', $body);
            $stmt->bindParam(':toa', $toa);
            $stmt->bindParam(':sc_toa', $sc_toa);
            $stmt->bindParam(':service_number', $service_number);
            $stmt->bindParam(':read', $read);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':locked', $locked);
            $stmt->bindParam(':date_sent', $date_sent);
            $stmt->bindParam(':readable_date', $readable_date);
            $stmt->bindParam(':contact_name', $contact_name);

                foreach ($msgArr as $msg) {

                    $address = $msg->address;
                    $date = $msg->date;
                    $type = $msg->type;
                    $subject = $msg->subject;
                    $body = $msg->body;
                    $toa = $msg->toa;
                    $sc_toa = $msg->sc_toa;
                    $service_number = $msg->service_number;
                    $read = $msg->read;
                    $status = $msg->status;
                    $locked = $msg->locked;
                    $date_sent = $msg->date_sent;
                    $readable_date = $msg->readable_date;
                    $contact_name = $msg->contact_name;

                    $stmt->execute();

                }
            }catch (\PDOException $e){
                Logger::log($e->getMessage());
            }
    }
}