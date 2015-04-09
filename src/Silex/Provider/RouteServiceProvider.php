<?php

namespace Silex\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Routing\Route;

class RouteServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $options = $pimple['router.options'];

        foreach ($options['routes'] as $name => $route) {
            $pimple['routes']->add(
                $name,
                new Route(
                    $options['prefix'].$route['path'],
                    $route['defaults'],
                    [],
                    isset($route['options']) ? $route['options'] : [],
                    '',
                    [],
                    $route['methods']
                )
            );
        }
    }
}

