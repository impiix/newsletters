<?php

namespace Task\Service;

use Task\Event\Event;
use Task\Event\EventDispatcher;
use Task\Entity\Email;
use Task\Entity\Newsletter;
use Task\Entity\Subscriber;
use Task\Entity\SubscriberList;
use Task\Event\UserSubscribeEvent;

class EventSendService extends SendService
{
    protected $eventDispatcher;

    public function __construct(GeneratorService $generatorService, EventDispatcher $eventDispatcher)
    {
        parent::__construct($generatorService);
        $this->eventDispatcher = $eventDispatcher;
    }

    public function subscribe(Subscriber $subscriber, SubscriberList $list)
    {
        $list->subscribe($subscriber);
        $this->eventDispatcher->dispatch(new UserSubscribeEvent(Event::NAME_USER_SUBSCRIBE, $subscriber, $list));
    }
}
