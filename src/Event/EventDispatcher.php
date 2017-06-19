<?php

namespace Task\Event;

class EventDispatcher
{
    protected $eventListener;

    /**
     * EventDispatcher constructor.
     * @param $eventListener
     */
    public function __construct(EventListener $eventListener)
    {
        $this->eventListener = $eventListener;
    }

    public function dispatch(Event $event)
    {
        $this->eventListener->handle($event);
    }
}
