<?php

namespace ContainerCNBS3NK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Y0zyazVService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Y0zyazV' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Y0zyazV'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'artistRepository' => ['privates', 'App\\Repository\\ArtistRepository', 'getArtistRepositoryService', true],
            'discRepository' => ['privates', 'App\\Repository\\DiscRepository', 'getDiscRepositoryService', true],
        ], [
            'artistRepository' => 'App\\Repository\\ArtistRepository',
            'discRepository' => 'App\\Repository\\DiscRepository',
        ]);
    }
}
