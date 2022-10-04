<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Codeception\Event\SuiteEvent;
use Codeception\Events;
use Codeception\Extension;
use Codeception\Module\Symfony;
use Twig\Environment;

// smell test, something's wrong...


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
        /** @var Environment $twig */
        $twig = $symfony->grabService('twig');
        assert($twig, "Twig is not loaded");
        $results = $twig->render('{{ x }}', ['x' => 'yes']);
        dd("yes, it works! " . $results);
    }

//    public static function getSubscribedEvents(): array
//    {
//        return [
//            Events::SUITE_AFTER => 'afterSuite',
//        ];
//    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::SUITE_INIT => 'receiveModuleContainer',
            Events::SUITE_AFTER => 'afterSuite',
        ];
    }


}
