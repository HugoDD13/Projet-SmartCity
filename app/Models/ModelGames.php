<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelGames extends Model
{
    public static function createGame($id, $tempsFinal, $scoreFinal, $dateCreation, $description){
        DB::insert('insert into JEU (ID_ROUTE,TEMPSFINAL, SCOREFINAL, DATECREATION, DESCRIPTION) values (?,?, ?, ?, ?)', [$id, $tempsFinal, $scoreFinal, $dateCreation, $description]);
        
        return 1;
    }

    public static function deleteGame($id, $idJouer, $idReponseJoueur){

        if ($idJouer != null || $idReponseJoueur != null) {
            foreach ($idJouer[0] as $jouer) {
                DB::delete('delete from JOUER where ID_JEUX = ?', [$jouer]);
            foreach ($idReponseJoueur[0] as $reponseJoueur) {
                DB::delete('delete from REPONSE_JOUEUR where ID_JEU = ?', [$reponseJoueur]);
            }
        }
        DB::delete('delete from JEU where ID = ?', [$id]);
    }
    }

    public static function loadAllGames()
    {
        $allGames = DB::select('select ID, TEMPSFINAL, SCOREFINAL, DATECREATION, DESCRIPTION from JEU');

        return $allGames;
    }
}
