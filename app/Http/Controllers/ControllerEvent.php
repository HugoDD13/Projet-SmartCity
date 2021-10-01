<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelRoutes;
use App\Models\ModelSteps;
use App\Models\ModelSteproutereport;
use App\Models\ModelEvent;
use Illuminate\Http\Request;
use DateTime;

class ControllerEvent extends Controller
{

// Code Event

public function EventCreation(Request $request, $id){
    session_start();

    $data = array(
        'result' => 1,
        $creationDate = new DateTime('now'),
        $inpLocation2 = $request->inpLocation2,
        $NameEvent = $request->NameEvent,
        $IndicationEvent = $request->IndicationEvent,
        $Reward = $request->Reward,
        $inpLongitude2 = $request->inpLongitude2,
        $inpLatitude2 = $request->inpLatitude2,
        $id = $request->id,
        'routeName' => ModelRoutes::routeName($id),
        'addEvent' => ModelEvent::createEvent($id, $NameEvent, $inpLocation2, $creationDate, $IndicationEvent, $Reward, $inpLongitude2, $inpLatitude2),
        $idEvent =  ModelEvent::createEvent($id, $NameEvent, $inpLocation2, $creationDate, $IndicationEvent, $Reward, $inpLongitude2, $inpLatitude2),
    );

    return view('stepsPage', compact('data'));
}


}
