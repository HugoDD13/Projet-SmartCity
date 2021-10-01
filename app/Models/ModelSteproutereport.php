<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelSteproutereport extends Model
{
    public static function addStepRouteReport($id, $idStep) {
        DB::insert('insert into STEPROUTEREPORT (IDROUTE, IDSTEP) values (?, ?)', [$id, $idStep]);
    }
}
