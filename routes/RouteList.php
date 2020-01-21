<?php
namespace OxiVanisher\TimeToFly;

use Concrete\Core\Http\Request;
use Concrete\Core\Routing\RouteListInterface;
use Concrete\Core\Routing\Router;
use Concrete\Package\TimeToFly\Controller\CalculateTime;

class RouteList implements RouteListInterface
{

    public function loadRoutes(Router $router)
    {
        $router->get('/api/timetofly/get/simple',function(){

            $request = Request::createFromGlobals();
            $lat = $request->get('lat');
            $long = $request->get('long');
            $time = new CalculateTime();
            return $time->getSimple($lat,$long);

        });

        $router->get('/api/timetofly/get/list',function(){

            $request = Request::createFromGlobals();
            $lat = $request->get('lat');
            $long = $request->get('long');
            $time = new CalculateTime();
            return $time->getList($lat,$long);

        });

    }
}
