Codeception Symfony Demo
========================

This is the Symfony Demo with Codeception installed and some simple cepts.

It fails when getting the Symfony module from an event subscriber, so there is either a bug in Codeception or (more likely) an error in the configuration.

Requirements
------------

  * PHP 8.1.0 or higher;
  * PDO-SQLite PHP extension enabled;
  * and the [usual Symfony application requirements][2].

Installation
------------

```bash
git clone https://github.com/tacman/codeception-symfony-demo  && cd codeception-symfony-demo
composer install
symfony server:start -d
vendor/bin/codecept run -v
```

Result
------

```
vendor/bin/codecept run -v
Codeception PHP Testing Framework v5.0.2 https://helpukrainewin.org

App\Tests.acceptance Tests (3) --------------------------------------------------------------------------------------------------------------------------------------------
Modules: Symfony, PhpBrowser, \App\Tests\Helper\Acceptance
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
✔ BlogCept: Open blog page and see article there (0.26s)
✔ LoginCept: Login as admin to backend (0.39s)
✔ FirstCest: Try to test (0.00s)

In Extension.php line 123:
                                                  
  [Codeception\Exception\ModuleRequireException]  
  [Symfony] module requirements not met --        
                                                  
  module is not enabled                           
                                                  

Exception trace:
  at /home/tac/survos/play/codeception-symfony-demo/vendor/codeception/codeception/src/Codeception/Extension.php:123
 Codeception\Extension->getModule() at /home/tac/survos/play/codeception-symfony-demo/src/EventSubscriber/LoggerSubscriber.php:36
 App\EventSubscriber\LoggerSubscriber->afterSuite() at /home/tac/survos/play/codeception-symfony-demo/vendor/symfony/event-dispatcher/EventDispatcher.php:230
 Symfony\Component\EventDispatcher\EventDispatcher->callListeners() at /home/tac/survos/play/codeception-symfony-demo/vendor/symfony/event-dispatcher/EventDispatcher.php:59
 Symfony\Component\EventDispatcher\EventDispatcher->dispatch() at /home/tac/survos/play/codeception-symfony-demo/vendor/codeception/codeception/src/Codeception/SuiteManager.php:150
```

Configuration
-------------

