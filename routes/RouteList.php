<?php


namespace OxiVanisher\TimeToFly;

use Concrete\Core\Routing\RouteListInterface;
use Concrete\Core\Routing\Router;
use Concrete\Package\TimeToFly\Controller\CalculateTime;
use Symfony\Component\HttpFoundation\JsonResponse;

class RouteList implements RouteListInterface
{

    public function loadRoutes(Router $router)
    {
        $router->get('/api/timetofly/get/simple',function(){
            $time = new CalculateTime();
            return $time->getSimple();
        });

        $router->get('/api/timetofly/get/list',function(){
            $time = new CalculateTime();
            return $time->getList();
        });

    }
}