<?php
ini_set ( 'display_errors' , 1 );

include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'Logger/src/FbLogger.php';
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'Logger/src/LoggerIndex.php';
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'Logger/src/MailLogger.php';
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'Logger/src/XMLLogger.php';
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . 'Logger/src/AbstractLogger.php';

/**
 * @var object $mailObserver
 */
$mailObserver = new MailLogger( 'smnnartur2@gmail.com' , 'Error' );
$mailObserver->setEvents ( 'error' );

/**
 * @var object $xmlObserver
 */
$xmlObserver = new XMLLogger( $_SERVER[ "DOCUMENT_ROOT" ] . 'Logger/tmp/XMLLogger.xml' , 300000 );
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
    'Logger/tmp/info.txt' ,
    'Logger/tmp/debug.txt' ,
    'Logger/tmp/error.txt'
);

$logger->attach ( $mailObserver )
       ->attach ( $xmlObserver );

set_error_handler ( function ( $errno , $errstr , $errfile , $errline ) use ( $logger ) {

    $mask_error = E_WARNING | E_ERROR;
    $mask_notice = E_NOTICE;


    $url = urldecode ( $_SERVER[ 'REQUEST_URI' ] );
    if ( $mask_error & $errno ) {
        $errormsg = "[$errno] ERROR/DEBUG: $errstr on line $errline in file \"$errfile\" by url \"$url\" \r\n";
        $logger->error ( $errormsg );
    } elseif ( $mask_notice & $errno ) {
        $errormsg = "[$errno] INFO: $errstr on line $errline in file \"$errfile\" by url \"$url\" \r\n";
        $logger->info ( $errormsg );
    }
} );

trigger_error ( "Oops!" , E_ERROR );
