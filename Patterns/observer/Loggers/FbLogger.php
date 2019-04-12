<?php
class FbLogger implements SplObserver
{
    private $events = [];

    public function getEvents ()
    {
        return $this->events;
    }

    public function setEvents ( $value )
    {
        $this->events[] = $value;
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
            $this->fb ( $msg );
        }
    }

    public function fb ( array $arr )
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
