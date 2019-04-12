<?php

/**
 * AbstractLogger
 * @abstract
 * @version 1.0
 */
abstract class AbstractLogger implements SplObserver
{
    /**
     * @var array
     */
    private $events = [];

    /**
     * @return array
     */
    public function getEvents ()
    {
        return $this->events;
    }

    /**
     * @param array $value
     * @return $this реализация Паттерна fluent interface
     */
    public function setEvents ( $value )
    {
        $this->events[] = $value;
        return $this;
    }

    /**
     * @param $subject
     * @return void
     * @throws InvalidArgumentException
     */
    public function update ( SplSubject $subject )
    {
        if ( !$subject instanceof LoggerIndex ) {
            throw new InvalidArgumentException( 'передан неправильный аргумент - Аргумент должен принадлежать классу LoggerIndex' );
        }
        $msg = [];
        foreach ( $subject->getMsg () as $key => $value ) {
            if ( in_array ( $key , $this->events ) ) {
                $msg[] = $value;
            }
        }
        if ( !empty( $msg ) ) {
            $this->doUpdate ( $msg );
        }
    }

    /**
     * @abstract
     * @param array $arr
     */
    abstract public function doUpdate ( array $arr );

}

