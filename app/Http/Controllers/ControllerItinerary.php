<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelRoutes;
use App\Models\ModelSteps;
use App\Models\ModelEvent;
use Illuminate\Http\Request;

class ControllerItinerary extends Controller
{
    public function returnPage($id) {
        session_start();

        $data = array(
            'result' => 1,
            'routeName' => ModelRoutes::routeName($id),
            'showStep' => ModelSteps::showStep($id),
            'countStep' => ModelSteps::countStep($id),
            'showEvent' => ModelEvent::showEvent($id),
        );

        return view('itineraryPage', compact('data'));
    }
}
