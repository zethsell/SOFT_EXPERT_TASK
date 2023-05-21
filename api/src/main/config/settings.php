<?php

declare(strict_types=1);

// define like API
header('Content-Type: application/json; charset=utf-8');

// Set TimeZone
date_default_timezone_set(envVar('TZ', 'America/Sao_Paulo'));
