<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ModelRoutes extends Model
{
    public static function createRoute($routeName, $routeDescription, $routeHandicap, $routeCreationDate) {
        $resCreationRoute = 0;

        $parcoursInDb = DB::select('select NAME from ROUTE where NAME = ? AND DESCRIPTION = ? AND HANDICAP = ? AND CREATIONDATE = ?', [$routeName, $routeDescription, $routeHandicap, $routeCreationDate]);

        if ($parcoursInDb == null) {
            DB::insert('insert into ROUTE (NAME, DESCRIPTION, HANDICAP, CREATIONDATE) values (?, ?, ?, ?)' ,[$routeName, $routeDescription, $routeHandicap, $routeCreationDate]);
        
            $resCreationRoute = 1;
        }

        return $resCreationRoute;
    }

    public static function routeName($id) {
        $routeName = DB::select('select ID, NAME from route where ID = ?', [$id]);

        return $routeName;
    }

    public static function loadAllRoutes()
    {
        $allRoutes = DB::select('select * from route');

        return $allRoutes;
    }

    public static function deleteRoute($id, $idStep) {
        DB::delete('delete from STEPROUTEREPORT where IDROUTE = ?', [$id]);
        
        if ($idStep != null) {
            foreach ($idStep[0] as $step) {
                DB::delete('delete STEP where ID = ?', [$step]);
            }
        }

        DB::delete('delete from ROUTE where ID = ?', [$id]);
    }

}
