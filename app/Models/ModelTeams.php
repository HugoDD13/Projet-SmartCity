<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ModelTeams extends Model
{
    public static function createTeam($teamName, $teamImage) {
        $resCreationTeam = 0;

        // $teamInDb = DB::select('select NOM from EQUIPE where NOM = ? AND IMAGE = ?', [$teamName, $teamImage]);
        $teamInDb = DB::table('EQUIPE')->where('NOM', $teamName)->where('IMAGE', $teamImage)->value('NOM');

        if (!$teamInDb) {
            DB::insert('insert into EQUIPE (NOM, IMAGE) values (?, ?)' ,[$teamName, $teamImage]);

            $resCreationTeam = 1;
        }

        return $resCreationTeam;

    }

    public static function showTeam(){
        $reqTeams = DB::select('select * from EQUIPE');

        return $reqTeams;
    }


    public static function createPlayer($playerName, $playerFirstName) {
        $resCreationPlayer = 0;

        $playerInDb = DB::select('select NOM, PRENOM from JOUEUR where NOM = ? AND PRENOM = ?', [$playerName, $playerFirstName]);

        if (!$playerInDb) {
            DB::insert('insert into JOUEUR (NOM, PRENOM) values (?, ?)', [$playerName, $playerFirstName]);

            $resCreationPlayer = 1;
        }

        return $resCreationPlayer;
    }

    public static function showPlayer(){
        $reqPlayers = DB::select('select NOM, PRENOM from JOUEUR');

        return $reqPlayers;
    }


    public static function addPlayersInTeam($playerName, $playerFirstName) {

    }

}
