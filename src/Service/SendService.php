<?php

namespace Task\Service;

use Task\Event\Event;
use Task\Event\EventDispatcher;
use Task\Entity\Email;
use Task\Entity\Newsletter;
use Task\Entity\Subscriber;
use Task\Entity\SubscriberList;
use Task\Event\UserSubscribeEvent;

class SendService
{
    protected $generatorService;

    public function __construct(GeneratorService $generatorService)
    {
        $this->generatorService = $generatorService;
    }

    public function sendToLists(Email $email, array $lists)
    {
        if ($email instanceof Newsletter) {
            if ($email->getSentAt() && $email->getSentAt() >= new \DateTime()) {
                return false;
            }
        }

        /**
         * @var SubscriberList $list
         */
        foreach ($lists as $list) {
            if (!$list instanceof SubscriberList) {
                throw new \InvalidArgumentException("Wrong parameters passed: not a subscriber list.");
            }
            /**
             * @var Subscriber $subscriber
             */
            foreach ($list->getSubscriberList() as $subscriber) {
                $this->send($email, $subscriber);
            }
        }

        return true;
    }

    protected function send(Email $email, Subscriber $subscriber)
    {
        $content = $this->generatorService->generate($email, $subscriber);
        if ($content) {
            echo $content;
        }
    }

    public function sendWelcomeEmails(Subscriber $subscriber, SubscriberList $list)
    {
        /**
         * @var Email $email
         */
        foreach ($list->getWelcomeEmails() as $email) {
            $this->send($email, $subscriber);
        }
    }
}
