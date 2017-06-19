<?php

namespace Task\Event;

use Task\Entity\NotificationEmail;
use Task\Service\SendService;

class EventListener
{
    protected $sendService;

    /**
     * EventListener constructor.
     * @param $sendService
     */
    public function __construct(SendService $sendService)
    {
        $this->sendService = $sendService;
    }


    public function handle(Event $event)
    {
        if (isset($this->getConfig()[$event->getName()])) {
            $this->{$this->getConfig()[$event->getName()]}($event);
        }
    }

    protected function getConfig()
    {
        return [
            Event::NAME_NEW_CONTENT => 'onNewContent',
            Event::NAME_USER_SUBSCRIBE => 'onUserSubscribe'
            ];
    }

    protected function onNewContent(NewContentEvent $event)
    {
        $content = $event->getContent();
        $email = new NotificationEmail("Notification", $content);
        $this->sendService->sendToLists($email, $event->getLists());
    }

    protected function onUserSubscribe(UserSubscribeEvent $event)
    {
        $this->sendService->sendWelcomeEmails($event->getSubscriber(), $event->getList());
    }
}
