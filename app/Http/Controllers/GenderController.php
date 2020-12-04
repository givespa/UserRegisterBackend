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
     * Recibe como parámetro opcional: ('gender_id').
     * @author Gian Vespa
     */
    public function get(Request $request): JsonResponse
    {
        if ($request->gender_id){
            $gender = Gender::whereId($request->gender_id)->get();
        }else{
            $gender = Gender::all();
        }
        return response()->json($gender, 200);
    }
}
