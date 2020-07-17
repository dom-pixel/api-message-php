<?php

use App\Api\ApiMessage;

require __DIR__ . '/vendor/autoload.php';

print_r(Api\ApiMessage::message(true, 403)); 