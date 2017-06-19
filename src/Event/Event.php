<?php

namespace Task\Event;

class Event
{
    const NAME_NEW_CONTENT = 'new_content';
    const NAME_USER_SUBSCRIBE = 'user_subscribe';

    protected $name;

    /**
     * Event constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
