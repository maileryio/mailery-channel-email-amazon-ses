<?php

namespace Mailery\Channel\Email\Amazon\Provider;

use Yiisoft\Di\Container;
use Yiisoft\Di\Support\ServiceProvider;
use Yiisoft\Router\RouteCollectorInterface;
use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Channel\Email\Amazon\Controller\SettingsController;

final class RouteCollectorServiceProvider extends ServiceProvider
{
    /**
     * @param Container $container
     * @return void
     */
    public function register(Container $container): void
    {
        /** @var RouteCollectorInterface $collector */
        $collector = $container->get(RouteCollectorInterface::class);

        $collector->addGroup(
            Group::create(
                '/brand/{brandId:\d+}',
                [
                    Route::methods(['GET', 'POST'], '/settings/aws', [SettingsController::class, 'ses'])
                        ->name('/brand/settings/aws'),
                ]
            )
        );
    }
}
