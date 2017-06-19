<?php

namespace Task\Entity;

class Email
{
    protected $subject;

    protected $body;

    /**
     * Email constructor.
     * @param $subject
     * @param $body
     */
    public function __construct($subject, $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }
}
