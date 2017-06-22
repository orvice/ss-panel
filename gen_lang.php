<?php

$app = require './bootstrap/app.php';

$gl = new \App\Command\GenLang();
$gl->handle();
