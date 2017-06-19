<?php

require_once __DIR__.'/vendor/autoload.php';

$subscriber1 = new \Task\Entity\Subscriber('test1', 'test1@domain.com');
$subscriber2 = new \Task\Entity\Subscriber('test2', 'test2@domain.com');
$subscriber3 = new \Task\Entity\Subscriber('test3', 'test3@domain.com');
$subscriber4 = new \Task\Entity\Subscriber('test4', 'test4@domain.com');

$list1 = new \Task\Entity\SubscriberList("testList1");
$list2 = new \Task\Entity\SubscriberList("testList2");

$welcomeEmail = new \Task\Entity\WelcomeEmail("testWelcomeSubject", "testWelcomeContent");

$list1->addWelcomeEmail($welcomeEmail);

$generatorService = new \Task\Service\GeneratorService();

$sendService = new \Task\Service\SendService($generatorService);

$eventListener = new \Task\Event\EventListener($sendService);
$eventDispatcher = new \Task\Event\EventDispatcher($eventListener);

$sendService = new \Task\Service\EventSendService($generatorService, $eventDispatcher);

$sendService->subscribe($subscriber1, $list1);
$sendService->subscribe($subscriber2, $list1);

$sendService->subscribe($subscriber3, $list2);
$sendService->subscribe($subscriber4, $list2);

$newsletter = new \Task\Entity\Newsletter("testNewsletterSubject", "testNewsletterContent", new \DateTime("+1 day"));

$sendService->sendToLists($newsletter, [$list1, $list2]);

$contentService = new \Task\Service\ContentService($eventDispatcher);

$contentService->publish("some new content", [$list2]);
