<?php

namespace App\Services;

use App\Localization\DateTimer;
use App\Localization\DateTimerInterface;
use Psr\Log\LoggerInterface;
class BaseService
{
    protected static $dateTimer;

    protected $logger;

    public function __construct(LoggerInterface $logger,DateTimerInterface $dateTimer = null)
    {
        $this->logger = $logger;
        self::$dateTimer = $dateTimer ?: self::$dateTimer ?: new DateTimer();
    }

    public function getLogger()
    {
        return $this->logger;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getDateTimer()
    {
        return self::$dateTimer;
    }

    public static function setDateTimer(DateTimer|DateTimerInterface $dateTimer)
    {
        self::$dateTimer = $dateTimer;
    }






}
