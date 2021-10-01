<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelGames;
use App\Models\ModelRoutes;
use DateTime;

class ControllerGames extends Controller
{
    //
    public function returnPage() {
        session_start();

        $data = array(
            'allRoutes' => ModelRoutes::loadAllRoutes()
        );
        return view('gamesPage', compact('data'));
    }

    public function createGame(Request $request){
        session_start();

        $data = array(
            'allRoutes' => ModelRoutes::loadAllRoutes(),
            $id = 2,
            $tempsFinal = 23,
            $scoreFinal = 36,
            $dateCreation = new DateTime('now'),
            $description = $request->inputGameName,
            $gameCreated = ModelsGames::createGame($id, $tempsFinal, $scoreFinal, $dateCreation, $description),
            'allGames' => ModelsGames::loadAllGames()
        );

        return view('gamesPage', compact('data'));
    }
}
