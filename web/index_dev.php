<?php

require_once __DIR__.'/../Springbok/SpringbokKernel.php';

$kernel = new SpringbokKernel('dev', true);
$kernel->run();
