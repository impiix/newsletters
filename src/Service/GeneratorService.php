<?php

namespace Task\Service;

use Task\Entity\Email;
use Task\Entity\Subscriber;

class GeneratorService
{
    public function generate(Email $email, Subscriber $subscriber)
    {
        return sprintf(
            "Recipient: %s <%s>\nSubject: %s\n\n%s\n\n",
            $subscriber->getName(),
            $subscriber->getEmail(),
            $email->getSubject(),
            $email->getBody()
        );
    }
}
