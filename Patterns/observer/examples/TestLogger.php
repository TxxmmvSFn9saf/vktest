<?php
require_once '../../../lib/FirePHPCore/FirePHP.class.php';
include_once '../Loggers/FbLogger.php';
include_once '../Loggers/Logger.php';
include_once '../Loggers/MailLogger.php';
include_once '../Loggers/XMLLogger.php';

$observer = new MailLogger();
$observer->setEvents ( 'info' );

$xmlobserver = new XMLLogger(  $_SERVER["DOCUMENT_ROOT"].'/Patterns/observer/LoggerFiles/XMLLogger.xml' , 2000 );
$xmlobserver->setEvents ( 'info' );

$fbobserver = new FbLogger();
$fbobserver->setEvents ( 'info' );

$subject = new Logger();
$subject->attach ( $xmlobserver )
    ->attach ( $fbobserver )
    ->info ( 'Message - 1' )
    ->info ( 'Message - 2' );





