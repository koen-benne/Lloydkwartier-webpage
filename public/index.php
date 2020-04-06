<?php
require_once "../app/config/settings.php";
require_once "../app/vendor/autoload.php";

$bootstrap = new \System\Bootstrap\WebBootstrap();

echo $bootstrap->render();


