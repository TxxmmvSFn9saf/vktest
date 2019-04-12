<?php
include_once 'AbstractLogger.php';

/**
 * MailLogger
 * @version 1.0
 */
class MailLogger extends AbstractLogger
{

    /**
     * @var string $address
     */
    private $address;

    /**
     * @var string $subject
     */
    private $subject;




    /**
     * @return string
     */
    public function getAddress ()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress ( $address )
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject ()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject ( $subject )
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * MailLogger constructor.
     *
     * @param string $address
     * @param string $subject
     */
    public function __construct ( $address , $subject )
    {
        $this->address = $address;
        $this->subject = $subject;
    }

    /**
     * Отправляет сообщения на почту
     *
     * @param array $arr
     * @return void
     * @throws
     */
    public function doUpdate ( array $arr )
    {
        foreach ( $arr as $key => $value ) {
            foreach ( $value as $item ) {
                mail ( $this->getAddress () , $this->getSubject () , $item );
            }
        }

    }

//    /**
//     * Запись письма в файл
//     *
//     * @param string $item
//     * @return void
//     */
//    public function mailFile($item){
//        fopen ($this->mailFilePath,'a');
//        file_put_contents ($this->mailFilePath,"\n". date ( '[Y-m-d H:i:s]' )."\n [Address]-" .$this->getAddress ()."\n [Subject]-".$this->getSubject ()."\n [Message]-".$item,FILE_APPEND | LOCK_EX);
//    }

}
