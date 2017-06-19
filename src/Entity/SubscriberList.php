<?php

namespace Task\Entity;

class SubscriberList
{
    protected $name;

    protected $list = [];

    protected $welcomeEmails = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addWelcomeEmail(WelcomeEmail $email)
    {
        $this->welcomeEmails[] = $email;
    }

    public function subscribe(Subscriber $subscriber)
    {
        $this->list[] = $subscriber;
    }

    public function getSubscriberList()
    {
        return $this->list;
    }

    /**
     * @return array
     */
    public function getWelcomeEmails(): array
    {
        return $this->welcomeEmails;
    }
}
