<?php

namespace App\Services;

use App\Localization\DateTimerInterface;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Propel;
use Psr\Log\LoggerInterface;

abstract class DatabaseAccessService extends BaseService
{

    protected $connection;

    protected static $inTransaction;

    protected $ownTransaction;

    public function __construct(LoggerInterface $logger,DateTimerInterface $dateTimer = null)
    {
        $this->connection = Propel::getConnection();
        parent::__construct($logger,$dateTimer);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function setConnection(ConnectionInterface $connection)
    {
        $this->connection = $connection;

        return $this;
    }


    public function isOwnTransaction()
    {
        return $this->ownTransaction;
    }


    public function setOwnTransaction(bool $ownTransaction)
    {
        $this->ownTransaction = $ownTransaction;

        return $this;
    }


    public static function isInTransaction()
    {
        return self::$inTransaction;
    }


    public static function setInTransaction(bool $inTransaction)
    {
        self::$inTransaction = $inTransaction;
    }

    public function beginTransaction()
    {
        // Check if already in transaction
        if(self::isInTransaction()){
            return;
        }

        //Begin transaction
        self::setInTransaction(true);
        $this->setOwnTransaction(true)
            ->getConnection()
            ->beginTransaction();

    }

    public function commitTransaction(){

        if(!self::isInTransaction() || ! $this->isOwnTransaction()){
            return true;
        }

        //Commit transaction
        try{
            return $this->getConnection()->commit();
        }
        finally{
            self::setInTransaction(false);
            $this->setOwnTransaction(false);
        }
    }

    public function rollbackTransaction(){
        if(!self::isInTransaction() || ! $this->isOwnTransaction()){
            return false;
        }

        //Commit transaction
        try{
            return $this->getConnection()->rollBack();
        }
        finally{
            self::setInTransaction(false);
            $this->setOwnTransaction(false);
        }
    }




}
