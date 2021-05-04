<?php

use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Handler\NativeMailerHandler;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
require_once 'vendor/autoload.php';

// create a log channel
$log = new Logger($_GET["type"]);

//$log->pushHandler(new StreamHandler('path/to/emergency.log', Logger::EMERGENCY));
//$log->pushHandler(new StreamHandler('path/to/warning.log', Logger::WARNING));
//$log->pushHandler(new StreamHandler('path/to/critical.log', Logger::CRITICAL));
//$log->pushHandler(new StreamHandler('path/to/info.log', Logger::INFO));

// add records to the log


switch ($_GET["type"]){
    case "EMERGENCY":
        $log->pushHandler(new StreamHandler('path/to/emergency.log', Logger::EMERGENCY));
//        $log->pushHandler(new NativeMailerHandler('test@gmail.com', "error message", "test@hotmail.com"));
        $log->pushHandler(new BrowserConsoleHandler( Logger::EMERGENCY));
        $log->emergency($_GET["message"]);
        break;
    case "WARNING":
        $log->pushHandler(new StreamHandler('path/to/warning.log', Logger::WARNING));
        $log->pushHandler(new BrowserConsoleHandler( Logger::WARNING));
        $log->warning($_GET["message"]);
        break;
    case "CRITICAL":
        $log->pushHandler(new StreamHandler('path/to/critical.log', Logger::CRITICAL));
//        $log->pushHandler(new NativeMailerHandler('test@gmail.com', "error message", "test@hotmail.com"));
        $log->pushHandler(new BrowserConsoleHandler( Logger::CRITICAL));
        $log->critical($_GET["message"]);
        break;
    case "ERROR":
        $log->pushHandler(new StreamHandler('path/to/critical.log', Logger::ERROR));
//        $log->pushHandler(new NativeMailerHandler('test@gmail.com', "error message", "test@hotmail.com"));
        $log->pushHandler(new BrowserConsoleHandler( Logger::ERROR));
        $log->error($_GET["message"]);
        break;
    case "ALERT":
        $log->pushHandler(new StreamHandler('path/to/critical.log', Logger::ALERT));
//        $log->pushHandler(new NativeMailerHandler('test@gmail.com', "error message", "test@hotmail.com"));
        $log->pushHandler(new BrowserConsoleHandler( Logger::ALERT));
        $log->alert($_GET["message"]);
        break;
    case "INFO":
        $log->pushHandler(new StreamHandler('path/to/info.log', Logger::INFO));
        $log->pushHandler(new BrowserConsoleHandler( Logger::INFO));
        $log->info($_GET["message"]);
        break;
    case "NOTICE":
        $log->pushHandler(new StreamHandler('path/to/info.log', Logger::NOTICE));
        $log->pushHandler(new BrowserConsoleHandler( Logger::NOTICE));
        $log->notice($_GET["message"]);
        break;
    case "DEBUG":
        $log->pushHandler(new StreamHandler('path/to/info.log', Logger::DEBUG));
        $log->pushHandler(new BrowserConsoleHandler( Logger::DEBUG));
        $log->debug($_GET["message"]);
        break;
}

require_once "buttons.html";