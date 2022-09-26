<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Codeception\Event\SuiteEvent;
use Codeception\Events;
use Codeception\Extension;
use Codeception\Module\Symfony;  // smell test, something's wrong...


class LoggerSubscriber  extends Extension implements EventSubscriberInterface //
{

    // Not autowired correctly, so set config and options to []
    public function __construct(protected array $config=[], protected array $options=[])
    {
        parent::__construct($config, $options);
    }

    public function afterSuite(SuiteEvent $e)
    {
        /** @var Symfony $symfony */
        $symfony = $this->getModule('Symfony');
        $twig = $symfony->grabService('twig');
        assert($twig, "Twig is not loaded");
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::SUITE_AFTER => 'afterSuite',
        ];
    }



}
