<?php
class XMLLogger implements SplObserver
{
    private $path;
    private $file_size;
    private $events = [];

    public function __construct ( $path , $file_size = 3000000 )
    {
        $this->path = $path;
        $this->file_size = $file_size;
    }

    public function getPath ()
    {
        return $this->path;
    }

    public function setPath ( $path )
    {
        $this->path = $path;
        return $this;
    }

    public function update ( SplSubject $subject )
    {
        $msg = [];
        foreach ( $subject->getMsg () as $key => $value ) {
            if ( in_array ( $key , $this->events ) ) {
                $msg[] = $value;
            }
        }
        if ( !empty( $msg ) ) {
            $this->createXml ( $msg );
        }

    }

    protected function createXml ( array $arr )
    {
        $file = $this->path;
        $xml = new DOMDocument( '1.0' );
        $xml->formatOutput = true;
        if ( !file_exists ( $file ) ) {
            $root = $xml->createElement ( "logs" );
            $xml->appendChild ( $root );
        } else {
            $xml->load ( $file );
            $root = $xml->getElementsByTagName ( 'logs' )->item ( 0 );
        }
        foreach ( $arr as $key => $value ) {
            foreach ( $value as $item ) {
                $messages = $xml->createElement ( "messages" );
                $root->appendChild ( $messages );
                $message = $xml->createElement ( 'message' , $item[ 'message' ] );
                $messages->appendChild ( $message );
                $date = $xml->createElement ( 'date' , date ( '[Y-m-d H:i:s] ' ) );
                $messages->appendChild ( $date );
            }
        }

        $xml->save ( $file );

        $zip = new ZipArchive;
        if ( $zip->open ( "$file" . date ( '[Y-m-d ]' ) . '.zip' , ZipArchive::CREATE ) === TRUE && filesize ( $file ) > $this->file_size ) {
            $zip->addFile ( $file );
            $zip->close ();
            unlink ( $file );
        }
    }

    public function getEvents ()
    {
        return $this->events;
    }

    public function setEvents ( $value )
    {
        $this->events[] = $value;
        return $this;
    }

}