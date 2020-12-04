<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenderController extends Controller
{
            /**
     * @param Request $request
     * @return JsonResponse
     * Método obtener los generos.
     * Recibe como parámetros el siguientes: id
     * @author Gian Vespa
     */
    public function get($id = false): JsonResponse
    {
        // buscar usuario por id
        if ($id){
            $gender = Gender::whereId($id)->get();
        }else{
        // buscar todo los usuarios
            $gender = Gender::all();
        }
        return response()->json($gender, 200);
    }
}
