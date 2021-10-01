<?php

    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\ModelConnexion;
    use App\Models\ModelRoutes;
    use App\Models\ModelSteps;

class ControllerConnexion extends Controller
{
    public function verifConnexion(Request $request) {
        $data = array(
            $username = $request->inputName,
            $password = $request->inputPassword,
            'allRoutes' => ModelRoutes::loadAllRoutes()
        );
        
        $resultConnexions = ModelConnexion::VerifConnexion($username, $password);

        if ($resultConnexions == 1) {
            return view('routesPage', compact('data'));
        } else {
            return view('connexionPage');
        }
    }
}
