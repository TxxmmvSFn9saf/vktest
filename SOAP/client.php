<?php

class client
{
    private $instance;
    public function __construct ()
    {
        $params = array ( 'location' => 'http://test/SOAP/server.php' ,
                          'uri' => 'urn://SOAP/server.php',
                          'trace' => 1);
        $this->instance = new SoapClient( NULL , $params );

    }

    public function time ( $id )
    {
        return $this->instance->__soapCall ( 'getTime' , $id );
    }

    public function date ( $id )
    {
        return $this->instance->__soapCall ( 'getDate' , $id );
    }
}

$client = new client();
$id = array ( 'id' => 1 );
echo $client->time ( $id ) . " - ";
echo $client->date ( $id );
