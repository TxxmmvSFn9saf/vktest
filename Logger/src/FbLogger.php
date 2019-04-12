<?php
include_once 'AbstractLogger.php';

/**
 * FbLogger
 * реализует FirePHP
 * @version 1.0
 */
class FbLogger extends AbstractLogger
{


    /**
     * реализует FirePHP
     * @param array $arr
     * @return void
     * @throws
     */
    public function doUpdate ( array $arr )
    {
        $msg = [];
        foreach ( $arr as $key => $value ) {
            foreach ( $value as $item ) {
                $msg[] = $item;
            }
        }
        $fb = FirePHP::getInstance ( TRUE );
        $fb->log ( $msg , 'info:' );

    }

}
