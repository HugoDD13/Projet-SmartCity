<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelPartenaire extends Model
{
    // code event

    public static function addPartenaire($id, $idContrat, $idPartenaire, $idEvenement) {
        DB::insert('insert into partenairefinancant (IDCONTRAT, IDPARTENAIRE, IDEVENEMENT) values (?, ?, ?)', [$id, $idContrat, $idPartenaire, $idEvenement]);
        $idEvent = DB::select('select ID from PARTENAIREFINANCANT where IDCONTRAT = ? and IDPARTENAIRE = ? and IDEVENEMENT = ? where LOCATION',[$id, $idContrat, $idPartenaire, $idEvenement]);

        $idEvent = $idEvent[0]->ID;

        return $idEvent;
    }


    public static function showPartenaire($id) {
        $showPartenaire = DB::select('select NOM, ID from PARTENAIRE', [$id]);
        return $showPartenaire;
    }

}
