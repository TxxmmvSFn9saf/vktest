<?php

//require_once  $_SERVER['DOCUMENT_ROOT'].'/Logger/lib/FirePHPCore/FirePHP.class.php';
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'htdocs/testLogger/Logger/src/FbLogger.php';
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'htdocs/testLogger/Logger/src/LoggerIndex.php';
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'htdocs/testLogger/Logger/src/MailLogger.php';
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'htdocs/testLogger/Logger/src/XMLLogger.php';
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'htdocs/testLogger/Logger/src/AbstractLogger.php';
//include  __DIR__.'/../src/sendMail.php';

/**
 * @var object $mailObserver
 */
$mailObserver = new MailLogger( 'smnnartur2@gamil.com' , 'Error' );
$mailObserver->setEvents ( 'error' );

/**
 * @var object $xmlObserver
 */
$xmlObserver = new XMLLogger( $_SERVER[ "DOCUMENT_ROOT" ] . 'htdocs/testLogger/Logger/tmp/XMLLogger.xml' , 300000 );
$xmlObserver->setEvents ( 'info' );
$xmlObserver->setEvents ( 'debug' );
$xmlObserver->setEvents ( 'error' );

/**
 * @var object $fbObserver
 */
$fbObserver = new FbLogger();
$fbObserver->setEvents ( 'info' );
$fbObserver->setEvents ( 'debug' );
$fbObserver->setEvents ( 'error' );


/**
 * @var object $logger
 */
$logger = new LoggerIndex(
    'htdocs/testLogger/Logger/tmp/info.txt' ,
    'htdocs/testLogger/Logger/tmp/debug.txt' ,
    'htdocs/testLogger/Logger/tmp/error.txt'
);

$logger->attach ( $mailObserver )
    ->attach ( $xmlObserver )
    ->error ( 'error' )
    ->info ( 'info' )
    ->info ( 'info' )
    ->info ( 'info' )
    ->info ( 'info 2' );

set_error_handler ( function ( $errno , $errstr , $errfile , $errline ) use ( $logger ) {

    $mask_error = E_WARNING | E_ERROR;
    $mask_notice = E_NOTICE;

    $errormsg = "[$errno] ERROR: Error on line $errline in file \"$errfile\" by url \"$_SERVER[REQUEST_URI]\" \r\n";

    if ( $mask_error & $errno ) {
        $logger->error ( $errormsg );
    } elseif ( $mask_notice & $errno ) {
        $logger->info ( $errormsg );
    }
} );