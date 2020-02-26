<?php
//Define DB credentials
define("DB_HOST", "192.168.50.3");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "lloydkwartier");

//Define paths
define("INCLUDES_PATH", __DIR__ . "/../");
define("RESOURCES_PATH", "public/");
define("LOG_PATH", "../app/logs/");
define("IMAGES_PATH", "images");
define("BASE_PATH", "/");

//Custom error handler, so every error will throw a custom ErrorException
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});
