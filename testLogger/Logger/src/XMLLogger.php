<?php
include_once 'AbstractLogger.php';

/**
 * XMLLogger
 * @version 1.0
 */
class XMLLogger extends AbstractLogger
{


    /**
     * @var string $path
     */
    private $path;
    /**
     * @var integer $file_size
     */
    private $file_size;

    /**
     * @param string $path
     * @param integer $file_size
     * @return void
     */
    public function __construct ( $path , $file_size = 3000000 )
    {
        $this->path = $path;
        $this->file_size = $file_size;
    }

    /**
     * Создает xml файл и записывает сообщения в файл
     *
     * @param array $arr
     * @return void
     */
    public function doUpdate ( array $arr )
    {
        $file = $this->path;
        $xml = new DOMDocument( '1.0' );
        $xml->preserveWhiteSpace = false;
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
                $message = $xml->createElement ( 'message' , $item );
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


}