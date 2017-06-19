<?php

namespace Test;

use Task\Entity\Email;
use Task\Entity\Subscriber;
use Task\Service\EventSendService;
use Task\Service\GeneratorService;
use Task\Service\SendService;

class TestGeneratorService extends GeneratorService
{
    protected $contentSent;

    public function generate(Email $email, Subscriber $subscriber)
    {
        $content = parent::generate($email, $subscriber);
        $this->contentSent .= $content;
    }

    public function getContentSentAndClear()
    {
        $contentSent = $this->contentSent;
        $this->contentSent = "";

        return $contentSent;
    }
}
