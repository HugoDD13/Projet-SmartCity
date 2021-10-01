<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelRoutes;
use App\Models\ModelSteps;
use DateTime;

class ControllerRoutes extends Controller
{
    public function returnPage() {
        session_start();
        
        $data = array(
            'allRoutes' => ModelRoutes::loadAllRoutes()
        );

        return view('routesPage', compact('data'));
    }

    public function createRoute(Request $request) {
        session_start();

        $data = array(
            $routeName = $request->inpRouteName,
            $routeDescription = $request->inpRouteDescription,
            $routeHandicap = $request->inpRouteHandicap,
            'allRoutes' => ModelRoutes::loadAllRoutes(),
            $routeCreationDate = new DateTime('now')
        );

        if ($routeHandicap == null) {
            $routeHandicap = false;
        } else {
            $routeHandicap = true;
        }

        $routeCreated = ModelRoutes::createRoute($routeName, $routeDescription, $routeHandicap, $routeCreationDate);

        if ($routeCreated == 1) {
            return view('routesPage', compact('data'));
        } else {
            return view('routesPage');
        }
    }

    public function deleteRoute($id) {
        session_start();

        $data = array(
            'allRoutes' => ModelRoutes::loadAllRoutes(),
            $routeName = ModelRoutes::routeName($id),
            $idStep = ModelSteps::specificStep($id),
            $deleteRoute = ModelRoutes::deleteRoute($id, $idStep)
        );

        return view('routesPage', compact('data'));
    }

}
