<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Carbon\Carbon;
use Dotenv\Dotenv;
use App\Models\User;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once('./vendor/autoload.php');

$user = new User();

echo $user->get();

echo "<br><br><br>-----------------------<br><br><br>";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo env('POSTGRESQL_VERSION');
echo Carbon::now();

echo "<br><br><br>-----------------------<br><br><br>";

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => env("DB_CONNECTION", 'mysql'),
    'host' => env("DB_HOST", "localhost"),
    'database' => env("DB_DATABASE", "database"),
    'username' => env("DB_USERNAME", "root"),
    'password' => env("DB_PASSWORD", "password"),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();

$user = new User();

var_dump($user->all());exit;