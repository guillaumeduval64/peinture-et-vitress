<?php
// src/MyApp/ApBundle/TextMessage/Message.php

namespace MyApp\ApBundle\TextMessage;

class Message
{
    protected $twilio;


    public function __construct( $twilio)
    {
        $this->twilio = $twilio;
    }


    public function sendText( $phoneNumber, $text)
    {
       $twilio = $this->twilio;
                            $message = $twilio->account->sms_messages->create(
            '15146120598', // From a valid Twilio number
            '1'.$phoneNumber, // Text this number
            $text
        );
        return;
    }
}