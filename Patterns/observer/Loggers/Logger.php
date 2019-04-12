<?php
class Logger implements SplSubject
{
    private $msg = array ();
    private $observers;
    const EVENT_INFO = 'info';
    const EVENT_DEBUG = 'debug';
    const EVENT_ERROR = 'error';

    public function __construct ()
    {
        $this->observers = new SplObjectStorage();
    }

    public function getMsg ()
    {
        return $this->msg;
    }

    public function setMsg ( $msg )
    {
        $this->msg = $msg;
        return $this;
    }

    public function info ( $msg )
    {
        $this->msg[ self::EVENT_INFO ][] = ['message' => $msg];
        foreach ( $this->msg[ self::EVENT_INFO ] as $key => $value ) {
            file_put_contents ( '../LoggerFiles/info.txt' , "\n" . date ( '[Y-m-d H:i:s] ' ) . $value[ 'message' ] , FILE_APPEND | LOCK_EX );
        }
        return $this;
    }


    public function debug ( $msg )
    {
        $this->msg[ self::EVENT_DEBUG ][] = ['message' => $msg];
        foreach ( $this->msg[ 'debug' ] as $key => $value ) {
            file_put_contents ( '../LoggerFiles/debug.txt' , "\n" . date ( '[Y-m-d H:i:s] ' ) . $value[ 'message' ] , FILE_APPEND | LOCK_EX );
        }

        return $this;
    }

    public function error ( $msg )
    {
        $this->msg[ self::EVENT_ERROR ][] = ['message' => $msg];
        foreach ( $this->msg[ 'error' ] as $key => $value ) {
            file_put_contents ( '../LoggerFiles/error.txt' , "\n" . date ( '[Y-m-d H:i:s] ' ) . $value[ 'message' ] , FILE_APPEND | LOCK_EX );
        }
        return $this;
    }

    public function attach ( SplObserver $observer )
    {
        $this->observers->attach ( $observer );
        return $this;
    }

    public function detach ( SplObserver $observer )
    {
        $this->observers->detach ( $observer );
    }

    public function notify ()
    {
        foreach ( $this->observers as $observer ) {
            $observer->update ( $this );
        }
    }

    public function __destruct ()
    {
        $this->notify ();
    }
}