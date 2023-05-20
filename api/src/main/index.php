<?php

declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');

include_once '../../vendor/autoload.php';
include_once 'config/global.php';

import('@/main/config/env');
import('@/main/config/database');
import('@/main/config/routes');
