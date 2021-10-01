<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ModelSteps extends Model
{
    public static function allSteps($id) {
        $allSteps = DB::select('select STEP.ID, STEP.DESCRIPTION, STEP.VALIDATION, STEP.CREATIONDATE, STEP.NAME from STEP INNER JOIN STEPROUTEREPORT ON STEP.ID=STEPROUTEREPORT.IDSTEP INNER JOIN ROUTE ON ROUTE.ID=STEPROUTEREPORT.IDROUTE where ROUTE.ID = ?', [$id]);

        return $allSteps;
    }

    public static function createStep($creationDate, $inpLocation, $inpName, $inpLongitude, $inpLatitude) {
        DB::insert('insert into step (CREATIONDATE, ADDRESS, NAME, LONGITUDE, LATITUDE) values (?, ?, ?, ?, ?)', [$creationDate, $inpLocation, $inpName, $inpLongitude, $inpLatitude]);
        $idStep = DB::select('select ID from STEP where CREATIONDATE = ? and ADDRESS = ? and NAME = ? and LONGITUDE = ? and LATITUDE = ?',[$creationDate, $inpLocation, $inpName, $inpLongitude, $inpLatitude]);

        $idStep = $idStep[0]->ID;

        return $idStep;
    }

    public static function showStep($id) {
        $showStep = DB::select('select COUNT(STEP.ID) as COUNTSTEP, STEP.ADDRESS, STEP.ID, STEP.DESCRIPTION, STEP.VALIDATION, STEP.CREATIONDATE, STEP.NAME, STEP.LONGITUDE, STEP.LATITUDE from STEP INNER JOIN STEPROUTEREPORT ON STEP.ID=STEPROUTEREPORT.IDSTEP INNER JOIN ROUTE ON ROUTE.ID=STEPROUTEREPORT.IDROUTE where ROUTE.ID = ? GROUP BY STEP.ADDRESS, STEP.ID, STEP.DESCRIPTION, STEP.VALIDATION, STEP.CREATIONDATE, STEP.NAME, STEP.LONGITUDE, STEP.LATITUDE', [$id]);
        return $showStep;
    }
    public static function countStep($id) {
        $countStep = DB::select('select COUNT(STEP.ID) as COUNTSTEP from STEP INNER JOIN STEPROUTEREPORT ON STEP.ID=STEPROUTEREPORT.IDSTEP INNER JOIN ROUTE ON ROUTE.ID=STEPROUTEREPORT.IDROUTE where ROUTE.ID = ?', [$id]);
        return $countStep;
    }
    public static function specificStep($id) {
        $specificStep = DB::select('select STEP.ID from STEP INNER JOIN STEPROUTEREPORT ON STEP.ID=STEPROUTEREPORT.IDSTEP INNER JOIN ROUTE ON ROUTE.ID=STEPROUTEREPORT.IDROUTE where ROUTE.ID = ?', [$id]);

        return $specificStep;
    }

    public static function deleteStep($id, $idStep) {
        DB::delete('delete from STEPROUTEREPORT where IDROUTE = ? AND IDSTEP = ?', [$id, $idStep]);
        DB::delete('delete from STEP where ID = ?', [$idStep]);
    }


}
