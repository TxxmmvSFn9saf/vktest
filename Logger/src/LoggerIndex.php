<?php
/**
 * LoggerIndex
 * Класс реализует Паттерн Observer
 *
 * @version 1.0
 */

class LoggerIndex implements SplSubject
{
    /**
     * @var array $msg
     */
    private $msg = array ();
    /**
     * @var array $observers
     */
    private $observers;
    /**
     * @const  EVENT_INFO
     */
    const EVENT_INFO = 'info';
    /**
     * @const  EVENT_DEBUG
     */
    const EVENT_DEBUG = 'debug';
    /**
     * @const  EVENT_ERROR
     */
    const EVENT_ERROR = 'error';

    private $infoPath;
    private $debugPath;
    private $errorPath;

    /**
     * @return string
     */
    public function getInfoPath ()
    {
        return $this->infoPath;
    }

    /**
     * @return string
     */
    public function getDebugPath ()
    {
        return $this->debugPath;
    }

    /**
     * @return string
     */
    public function getErrorPath ()
    {
        return $this->errorPath;
    }

    /**
     * SplObjectStorage предоставляет соответствие набор объектов, игнорируя данные
     *
     * @param string $infoPath
     * @param string $debugPath
     * @param string $errorPath
     * @return void
     */
    public function __construct ( $infoPath , $debugPath , $errorPath )
    {
        $this->observers = new SplObjectStorage();
        $this->infoPath = $_SERVER[ 'DOCUMENT_ROOT' ] . $infoPath;
        $this->debugPath = $_SERVER[ 'DOCUMENT_ROOT' ] . $debugPath;
        $this->errorPath = $_SERVER[ 'DOCUMENT_ROOT' ] . $errorPath;

    }

    /**
     * @return array $msg
     */
    public function getMsg ()
    {
        return $this->msg;
    }

    /**
     * @param string $msg
     * @return $this реализация Паттерна fluent interface
     *
     */
    public function setMsg ( $msg )
    {
        $this->msg = $msg;
        return $this;
    }


    /**
     * Запись сообщений в info.txt
     *
     * @param $msg
     * @return $this реализация Паттерна fluent interface
     */
    public function info ( $msg )
    {

        fopen ( $this->infoPath , 'a' );

        if ( !is_string ( $msg ) ) {
            throw new InvalidArgumentException( 'тип сообщения должен быть строкой' );

        } else {
            if ( !empty($this->msg[ self::EVENT_INFO ]) && is_array ( $this->msg[ self::EVENT_INFO ] ) ) {
                if ( !in_array ( $msg , $this->msg[ self::EVENT_INFO ] ) ) {
                    $this->msg[ self::EVENT_INFO ][] = $msg;
                    file_put_contents ( $this->infoPath , "\n" . date ( '[Y-m-d H:i:s] ' ) . $msg , FILE_APPEND | LOCK_EX );
                }
            } else {
                $this->msg[ self::EVENT_INFO ][] = $msg;
                file_put_contents ( $this->infoPath , "\n" . date ( '[Y-m-d H:i:s] ' ) . $msg , FILE_APPEND | LOCK_EX );
            }

        }
        return $this;
    }

    /**
     * Запись сообщений в debug.txt
     *
     * @param $msg
     * @return $this реализация Паттерна fluent interface
     */
    public function debug ( $msg )
    {
        fopen ( $this->debugPath , 'a' );

        if ( !is_string ( $msg ) ) {
            throw new InvalidArgumentException( 'тип сообщения должен быть строкой' );

        } else {
            if ( is_array ( $this->msg[ self::EVENT_DEBUG ] ) ) {
                if ( !in_array ( $msg , $this->msg[ self::EVENT_DEBUG ] ) ) {
                    $this->msg[ self::EVENT_DEBUG ][] = $msg;
                    file_put_contents ( $this->debugPath , "\n" . date ( '[Y-m-d H:i:s] ' ) . $msg , FILE_APPEND | LOCK_EX );
                }
            } else {
                $this->msg[ self::EVENT_DEBUG ][] = $msg;
                file_put_contents ( $this->debugPath , "\n" . date ( '[Y-m-d H:i:s] ' ) . $msg , FILE_APPEND | LOCK_EX );
            }

        }
        return $this;
    }

    /**
     * Запись сообщений в error.txt
     *
     * @param $msg
     * @return $this реализация Паттерна fluent interface
     */
    public function error ( $msg )
    {
        fopen ( $this->errorPath , 'a' );

        if ( !is_string ( $msg ) ) {
            throw new InvalidArgumentException( 'тип сообщения должен быть строкой' );
        } else {
            if ( is_array ( $this->msg[ self::EVENT_ERROR ] ) ) {
                if ( !in_array ( $msg , $this->msg[ self::EVENT_ERROR ] ) ) {
                    $this->msg[ self::EVENT_ERROR ][] = $msg;
                    file_put_contents ( $this->errorPath , "\n" . date ( '[Y-m-d H:i:s] ' ) . $msg , FILE_APPEND | LOCK_EX );
                } 
            } else {
                $this->msg[ self::EVENT_ERROR ][] = $msg;
                file_put_contents ( $this->errorPath , "\n" . date ( '[Y-m-d H:i:s] ' ) . $msg , FILE_APPEND | LOCK_EX );
            }
        }
        return $this;
    }

    /**
     * Attach an SplObserver
     * @link https://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return $this реализация Паттерна fluent interface
     * @since 5.1.0
     */
    public function attach ( SplObserver $observer )
    {
        $this->observers->attach ( $observer );
        return $this;
    }

    /**
     * Detach an observer
     * @link https://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function detach ( SplObserver $observer )
    {
        $this->observers->detach ( $observer );
    }

    /**
     * Notify an observer
     * @link https://php.net/manual/en/splsubject.notify.php
     * @return void
     * @since 5.1.0
     */
    public function notify ()
    {
        foreach ( $this->observers as $observer ) {
            $observer->update ( $this );
        }
        $this->msg = [];
    }

    /**
     * После уничтожения Объекта реализует метод notify
     *
     * @return void
     */
    public function __destruct ()
    {
        $this->notify ();
    }

}