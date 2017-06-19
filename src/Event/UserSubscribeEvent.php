<?php

namespace Task\Event;

use Task\Entity\Subscriber;
use Task\Entity\SubscriberList;

class UserSubscribeEvent extends Event
{
    protected $subscriber;

    protected $list;

    /**
     * UserSubscribeEvent constructor.
     * @param $subscriber
     * @param $list
     */
    public function __construct($name, Subscriber $subscriber, SubscriberList $list)
    {
        parent::__construct($name);
        $this->subscriber = $subscriber;
        $this->list = $list;
    }

    /**
     * @return Subscriber
     */
    public function getSubscriber(): Subscriber
    {
        return $this->subscriber;
    }

    /**
     * @return SubscriberList
     */
    public function getList(): SubscriberList
    {
        return $this->list;
    }
}
