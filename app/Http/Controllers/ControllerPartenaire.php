<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelRoutes;
use App\Models\ModelSteps;
use App\Models\ModelSteproutereport;
use App\Models\ModelEvent;
use App\Models\ModelPartenaire;
use Illuminate\Http\Request;
use DateTime;

class ControllerEvent extends Controller
{
    public function addPartenaire(Request $request, $id){
        session_start();

        $data = array(
            'result' => 1,
            $idEvenement = $request->idEvenement,
            $idPartenaire = $request->idPartenaire,
            $idContrat = $request->idContrat,
            $id = $request->id,
            'routeName' => ModelRoutes::routeName($id),
            'addPartenaire' => ModelPartenaire::addPartenaire($id, $idContrat, $idPartenaire, $idEvenement),
            $idPartenaireFinancant =  ModelPartenaire::addPartenaire($id, $idContrat, $idPartenaire, $idEvenement),
        );

        return view('stepsPage', compact('data'));
    }


    public function showPartenaire($id) {

        $data = array(
            'result' => 1,
            'showPartenaire' => ModelPartenaire::showPartenaire($id)
        );

        return view('stepsPage', compact('data'));
    }

}
