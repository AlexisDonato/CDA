<?php

namespace ContainerCNBS3NK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Sl9TaJ7Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.sl9TaJ7' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.sl9TaJ7'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'artist' => ['privates', '.errored..service_locator.sl9TaJ7.App\\Entity\\Artist', NULL, 'Cannot autowire service ".service_locator.sl9TaJ7": it references class "App\\Entity\\Artist" but no such service exists.'],
            'artistRepository' => ['privates', 'App\\Repository\\ArtistRepository', 'getArtistRepositoryService', true],
        ], [
            'artist' => 'App\\Entity\\Artist',
            'artistRepository' => 'App\\Repository\\ArtistRepository',
        ]);
    }
}
