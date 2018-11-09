<?php

namespace Presentation\web;

use Application\Mvc\Mvc;

define("ROOT", realpath(__dir__."/.."));
require '../../vendor/autoload.php';
error_reporting(E_ALL);
require ROOT.'/../Infrastructure/Persistence/Doctrine/Bootstrap.php';
//print_r($_POST);die;
Mvc::run($entityManager);