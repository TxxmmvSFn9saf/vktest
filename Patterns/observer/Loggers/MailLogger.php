<?php
class MailLogger implements SplObserver
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
            $this->sendMail ( $msg );
        }
    }

    protected function sendMail ( array $arr )
    {
        foreach ( $arr as $key => $value ) {
            foreach ( $value as $item ) {
                mail ( "example@example.com" , "My Subject" , $item[ 'message' ]
                );
            }
        }

    }
}
