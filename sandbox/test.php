<?php

    namespace App;

    use Dez\DependencyInjection\Container;
    use Dez\Flash\Flash\Session;
    use Dez\Session\Adapter\Files;

    error_reporting(1); ini_set('display_errors', 1);

    include_once '../vendor/autoload.php';

    $container  = Container::instance();

    $session    = new Files();
    $session->start();

    $container->set( 'session', $session );

    $container->set( 'flash', new Session() );

    /** @var Session $flash  */
    $flash  = $container->get( 'flash' );

    $flash->info( 'info message' );

    $flash->error( 'error message' )->error( 'error message' );

    var_dump(
        $flash->getMessages()
    );