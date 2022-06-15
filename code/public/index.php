<?php
namespace App;

error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use App\Factory\Factory;
use App\Persistence\MySqlConnector;

$app = AppFactory::create();

$mySqlConnector = new MySqlConnector();

$factory = new Factory();
$factory->createApplication($mySqlConnector)->startApp($app);

$app->run();