<?php

require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '\src\Logger.php';
require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '\src\XMLLogger.php';
require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '\src\FbLogger.php';
require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '\src\MailLogger.php';

use PHPUnit\Framework\TestCase;

/**
 * LoggerTest
 * @version 1.0
 */
class LoggerTest extends TestCase
{

    /**
     * @var object $logger
    */
    private $logger;

    /**
     * @var string $pathInfo
    */
    private $pathInfo;

    /**
     * @var string $pathDebug
     */
    private $pathDebug;

    /**
     * @var string $pathError
     */
    private $pathError;

    /**
     * @var string $pathXML
     */
    private $pathXML;

    /**
     * @return void
    */
    protected function setUp ()
    {
        $this->pathInfo=__DIR__ . '../../tmp/info.txt';
        $this->pathDebug=__DIR__ . '/../tmp/debug.txt';
        $this->pathError=__DIR__ . '/../tmp/error.txt' ;
        $this->pathXML=__DIR__ . '/../tmp/XMLLogger.xml';
        $this->logger = new LoggerIndex(
            $this->pathInfo ,
            $this->pathDebug,
            $this->pathError);
    }

    /**
     * @return mixed
     */
    public function getLogger ()
    {
        return $this->logger;
    }

    /**
     * @return void
     */
    public function testInfo ()
    {

        unlink (  $this->pathInfo );
        $logger = clone $this->logger;
        $logger->info ( 'Test info message' );
        $this->assertFileExists (  $this->pathInfo );
        $this->assertStringEqualsFile (  $this->pathInfo, "\n" . date ( '[Y-m-d H:i:s] ' ) . 'Test info message' );

    }

    /**
     * @return void
     */
    public function testDebug ()
    {
        unlink ( __DIR__ . '/../tmp/debug.txt' );

        $logger = clone $this->logger;
        $logger->debug ( 'Test debug message' );

        $this->assertFileExists ( $this->pathDebug );
        $this->assertStringEqualsFile ( $this->pathDebug , "\n" . date ( '[Y-m-d H:i:s] ' ) . 'Test debug message' );


    }

    /**
     * @return void
     */
    public function testError ()
    {
        unlink ( $this->pathError );

        $logger = clone $this->logger;
        $logger->error ( 'Test error message' );

        $this->assertFileExists ( $this->pathError );
        $this->assertStringEqualsFile ( $this->pathError , "\n" . date ( '[Y-m-d H:i:s] ' ) . 'Test error message' );


    }

    /**
     * @return void
     */
    public function testNotify ()
    {
        unlink (  $this->pathXML );

        /**
         * @var object $mailObserver
         */
        $mailObserver = new MailLogger('example@example.com','mySubject');
        $mailObserver->setEvents ( 'info' );
        $mailObserver->setEvents ( 'debug' );
        $mailObserver->setEvents ( 'error' );

        /**
         * @var object $xmlObserver
         */
        $xmlObserver = new XMLLogger(  $this->pathXML , 300000 );
        $xmlObserver->setEvents ( 'info' );
        $xmlObserver->setEvents ( 'debug' );
        $xmlObserver->setEvents ( 'error' );

        /**
         * @var object $logger
         */
        $logger = $this->logger;
        $logger->attach ( $xmlObserver )
            ->attach ( $mailObserver )
            ->info ( 'Test info message' )
            ->debug ( 'Test debug message' )
            ->error ( 'Test error message' )
            ->notify ();

        $xmlDoc = new DOMDocument();
        $xmlDoc->load (  $this->pathXML );
        $msg = $xmlDoc->getElementsByTagname ( 'message' );

        $this->assertEquals ( 'Test info message' , $msg->item ( 0 )->nodeValue );
        $this->assertEquals ( 'Test debug message' , $msg->item ( 1 )->nodeValue );
        $this->assertEquals ( 'Test error message' , $msg->item ( 2 )->nodeValue );

    }

    /**
     * Нужен для Теста записи Error
     *
     * @return void
     */
    public function errorThrowTest() {
        fopen("nonexistingfile", "r");
    }

}

