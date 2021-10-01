<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelRoutes;
use App\Models\ModelSteps;
use App\Models\ModelSteproutereport;
use Illuminate\Http\Request;
use DateTime;

class ControllerSteps extends Controller
{
    public function stepCreationByRoute($id) {
        session_start();

        $data = array(
            'result' => 1,
            $allSteps = ModelSteps::allSteps($id),
            'routeName' => ModelRoutes::routeName($id),
            // 'showStep' => ModelSteps::showStep($id)
        );

        return view('stepsPage', compact('data'));
    }

    public function stepCreation(Request $request, $id){
        session_start();

        $data = array(
            'result' => 1,
            $creationDate = new DateTime('now'),
            $inpLocation = $request->inpLocation,
            $inpName = $request->inpName,
            $inpLongitude = $request->inpLongitude,
            $inpLatitude = $request->inpLatitude,
            'routeName' => ModelRoutes::routeName($id),
            'addStep' => ModelSteps::createStep($creationDate, $inpLocation, $inpName, $inpLongitude, $inpLatitude),
            $idStep =  ModelSteps::createStep($creationDate, $inpLocation, $inpName, $inpLongitude, $inpLatitude),
            // 'showStep' => ModelSteps::showStep($id),
            $addStepRouteReport = ModelSteproutereport::addStepRouteReport($id, $idStep)
        );

        return view('stepsPage', compact('data'));
    }

    public function showStep($id) {
        session_start();

        $data = array(
            'result' => 1,
            'routeName' => ModelRoutes::routeName($id),
            'showStep' => ModelSteps::showStep($id)
        );

        return view('stepsCreatedPage', compact('data'));
    }

    public function deleteStep($id, $idStep) {
        session_start();

        $data = array(
            'result' => 1,
            $allSteps = ModelSteps::allSteps($id),
            $deletedStep = ModelSteps::deleteStep($id, $idStep),
            'routeName' => ModelRoutes::routeName($id),
            'showStep' => ModelSteps::showStep($id)
        );

        return view('stepsPage', compact('data'));
    }

}
