<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . '/vendor/autoload.php';
use ChatApi\Service\MessageService;
use ChatApi\Entity\Authentication;

$auth = new Authentication('phhgrdl3f19mcqay', " https://eu38.chat-api.com/instance35900/");
$service = new MessageService($auth);
$service->getMessages();