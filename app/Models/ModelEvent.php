<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelEvent extends Model
{
    // code event

    public static function createEvent($id, $NameEvent, $inpLocation2, $creationDate, $IndicationEvent, $Reward, $inpLongitude2, $inpLatitude2) {
        DB::insert('insert into event (ID_ROUTE, NAMEEVENT, ADDRESS, CREATIONDATE, INDICATION, REWARD, LONGITUDE, LATITUDE) values (?, ?, ?, ?, ?, ?, ?, ?)', [$id, $NameEvent, $inpLocation2, $creationDate, $IndicationEvent, $Reward, $inpLongitude2, $inpLatitude2]);
        $idEvent = DB::select('select ID from EVENT where ID_ROUTE = ? and NAMEEVENT = ? and ADDRESS = ? and CREATIONDATE = ? and INDICATION = ? and REWARD = ? and LONGITUDE = ? and LATITUDE = ?',[$id, $NameEvent, $inpLocation2, $creationDate, $IndicationEvent, $Reward, $inpLongitude2, $inpLatitude2]);

        $idEvent = $idEvent[0]->ID;

        return $idEvent;
    }

    public static function showEvent($id) {
        $showEvent = DB::select('select COUNT(EVENT.ID) as COUNTEVENT, EVENT.NAMEEVENT, EVENT.ADDRESS, EVENT.CREATIONDATE, EVENT.INDICATION, EVENT.REWARD, EVENT.LONGITUDE, EVENT.LATITUDE from EVENT INNER JOIN ROUTE ON EVENT.ID_ROUTE=ROUTE.ID where ROUTE.ID = ? GROUP BY EVENT.NAMEEVENT, EVENT.ADDRESS, EVENT.CREATIONDATE, EVENT.INDICATION, EVENT.REWARD, EVENT.LONGITUDE, EVENT.LATITUDE', [$id]);
        return $showEvent;
    }

}

