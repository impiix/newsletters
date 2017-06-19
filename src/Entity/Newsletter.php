<?php

namespace Task\Entity;

class Newsletter extends Email
{
    protected $sentAt;

    public function __construct($subject, $body, \DateTime $sentAt = null)
    {
        parent::__construct($subject, $body);
        $this->sentAt = $sentAt;
    }

    public function getSentAt()
    {
        return $this->sentAt;
    }
}
