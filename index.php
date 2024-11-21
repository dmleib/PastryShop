<?php

require_once ("application/config/config.php");

// Load autoloader
require_once ("vendor/autoload.php");

// Load the dispatcher that dissects a request URL
new Dispatcher();

