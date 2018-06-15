<?php

use App\Core\App;

require __DIR__.'/../vendor/autoload.php';

App::bootstrap();
App::$kernel->launch();