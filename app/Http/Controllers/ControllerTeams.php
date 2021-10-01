<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelTeams;
use Illuminate\Http\Request;

class ControllerTeams extends Controller
{
    public function returnPage() {
        session_start();

        $data = array(
            'result' => 0,
            'allPlayers' => ModelTeams::showPlayer()
        );

        return view('teamsPage', compact('data'));
    }

    public function createTeam(Request $request) {
        session_start();

        $data = array(
            'result' => 1,
            $teamName = $request->inputTeamName,
            $teamImage = $request->inputImage,
            $teamCreated = ModelTeams::createTeam($teamName, $teamImage),
            'allTeams' => ModelTeams::showTeam()
        );

        return view('teamsPage', compact('data'));
    }

    public function createPlayer(Request $request) {
        session_start();

        $data = array(
            $playerName = $request->inputPlayerName,
            $playerFirstName = $request->inputPlayerFirstName,
            $playerCreated = ModelTeams::createPlayer($playerName, $playerFirstName),
            'allPlayers' => ModelTeams::showPlayer()
        );

        return view('teamsPage', compact('data'));
    }

    public function addPlayersInTeam(Request $request)
    {
        session_start();


    }

}
