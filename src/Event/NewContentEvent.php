<?php

namespace Task\Event;

class NewContentEvent extends Event
{
    protected $content;

    protected $lists;

    public function __construct($name, $content, array $lists)
    {
        parent::__construct($name);
        $this->content = $content;
        $this->lists = $lists;
    }

    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return array
     */
    public function getLists(): array
    {
        return $this->lists;
    }
}
