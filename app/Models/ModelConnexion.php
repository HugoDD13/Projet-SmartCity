<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelConnexion extends Model
{
    public static function verifConnexion($username, $password) {
        $resRequest = DB::select('select * from ORGANISATEUR where LOGIN = ? and PASSWORD = ?',[$username, $password]);

        if ($resRequest != null) {
            session_start();
            $_SESSION['Login'] = $resRequest;
            $userExists = 1;
        } else {
            $userExists = 0;
        }
        
        return $userExists;
    }
}
