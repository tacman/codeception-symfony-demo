<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use Codeception\Event\SuiteEvent;
use Codeception\Events;
use Codeception\Extension;
use Codeception\Module\Symfony;  // smell test, something's wrong...
use Codeception\Step;
use Twig\Environment;


class LoggerSubscriber  extends Extension implements EventSubscriberInterface //
{

    // Not autowired correctly...
    public function __construct(
        protected array $config=[], protected array $options=[]
    )
    {
        parent::__construct($config, $this->options);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::SUITE_AFTER => 'afterSuite',
        ];
    }

    public function afterSuite(SuiteEvent $e)
    {
        /** @var Symfony $symfony */
        $symfony = $this->getModule('Symfony');
        $twig = $symfony->grabService('twig');
        assert($twig, "Twig is not loaded");
    }


}
