<?php

namespace Task\Entity;

class WelcomeEmail extends Email
{
    public function send(Subscriber $subscriber)
    {
        throw new \RuntimeException("This email should only be send on user subscribe event.");
    }
}
