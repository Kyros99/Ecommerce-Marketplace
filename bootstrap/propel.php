<?php

use Monolog\Logger;
use Propel\Runtime\Connection\ConnectionManagerSingle;
use Propel\Runtime\Propel;

$propelConfiguration = require __DIR__ . '/../config/propel/propel.php';

// Create propel service container
$serviceContainer = Propel::getServiceContainer();
$serviceContainer->setAdapterClass('default','mysql');

//Get Configuration Settings
$dbConfig = $propelConfiguration['propel']['database']['connections']['default'];

//Setup Connection manager
$manager = new ConnectionManagerSingle('default');
$manager->setConfiguration($dbConfig);
$manager->setName('default');


// Set Connection to service Container
$serviceContainer->setConnectionManager($manager);

$serviceContainer->initDatabaseMaps();

$logger = new Logger('cl_marketplace');

//Setup path for all logs
$basePath = __DIR__ . '/../storage/logs/propel';

$path = $basePath . '/propel.debug.log';
$logger->pushHandler(new \Monolog\Handler\RotatingFileHandler($path,2,\Monolog\Level::Debug));

$path =$basePath . '/propel.error.log';
$logger->pushHandler(new \Monolog\Handler\RotatingFileHandler($path,2,\Monolog\Level::Error));

$serviceContainer->setLogger('defaultLogger',$logger);

$connection = $serviceContainer->getWriteConnection('default');
$connection->useDebug(true);
