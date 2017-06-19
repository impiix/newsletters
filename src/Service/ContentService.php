<?php

namespace Task\Service;

use Task\Event\Event;
use Task\Event\EventDispatcher;
use Task\Event\NewContentEvent;

class ContentService
{
    protected $eventDispatcher;

    public function __construct(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function publish(string $content, array $lists)
    {
        //do some publish logic...
        $event = new NewContentEvent(Event::NAME_NEW_CONTENT, $content, $lists);
        $this->eventDispatcher->dispatch($event);
    }
}
