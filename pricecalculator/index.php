<?php
declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require 'controller/CustomerController.php';
require 'model/Customer.php';
require 'model/CustomerLoader.php';

$controller = new CustomerController();
$controller->render((int)$_GET['customer']);