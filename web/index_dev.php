<?php

require_once __DIR__.'/../springbok/springbokKernel.php';

$kernel = new SpringbokKernel('dev', true);
$kernel->run();
