<?php

class server
{
    public function getDate ()
    {
        return date ( 'm/d/Y' , time () );
    }

    public function getTime ()
    {
        return date ( 'h:i:s' , time () );
    }
}

$params = array ( 'uri' => 'SOAP/server.php' );
$server = new SoapServer( NULL , $params );
$server->setClass ( 'server' );
$server->handle ();