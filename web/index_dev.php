<?php

require_once __DIR__.'/../springbok/SpringbokKernel.php';

$kernel = new SpringbokKernel('dev', true);
$kernel->run();
