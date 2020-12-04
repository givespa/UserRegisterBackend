<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
        /**
     * @param Request $request
     * @return JsonResponse
     * Método obtener detalles del usuario.
     * Recibe como parámetros el siguientes: id
     * @author Gian Vespa
     */
    public function get($id = false): JsonResponse
    {
        // buscar usuario por id
        if ($id){
            $user = User::whereId($id)->get();
        }else{
        // buscar todo los usuarios
            $user = User::all();
        }
        return response()->json($user, 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * Método para crear un usuario.
     * Recibe como parámetro los siguientes: ('gender_id'), ('name' :string), ('email' :string),
     * ('age' :integer), ('married' :boolean (true || 1)), ('birthdate' :datetime), ('info' :string).
     * @author Gian Vespa
     */
    public function create(Request $request): JsonResponse
    {
        //verificación del estado civil, (true or 1) para verdadero.
       $married = $request->married;
       if($married === 'true' || $married === '1'){
        $married = true;
       }else{
        $married = false; 
       }

       //create register
        $user = User::create([
            'gender_id' => $request->gender_id,
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'married' => $married,
            'birthdate' => $request->birthdate,
            'info' => $request->info,
            'current_date' => date("m/d/y"),
            'current_time' => date("H:m:s")
        ]);

        return response()->json($user, 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * Método para actualizar un usuario.
     * Pasar como parametro: id
     * para actualizar cualquiera de estos datos: ('gender_id'), ('name' :string),
     * ('email' :string), ('age' :integer), ('married' :boolean), ('birthdate' :datetime), 
     * ('info' :string)
     * @author Gian Vespa
     */
    public function update(Request $request, $id): JsonResponse
    {
        $user_request = $request->all();
        
        if($id){
            $user = User::whereId($id)->first();
            if($user){
                $user->update($user_request);
                $user = User::whereId($id)->first();
                return response()->json($user, 200);
            }
            return response()->json('Usuario no encontrado', 200);
        }
        return response()->json('Debe pasar un id', 200);
    }

    /**
     * @return JsonResponse
     * Método para eliminar un usuario.
     * Recibe como parámetros el siguientes: id
     * @author Gian Vespa
     */
    public function destroy($id): JsonResponse
    {
        try {
            $user = User::whereId($id)->first();
            if ($user){
                $user->delete();
                return response()->json('Eliminado con éxito', 200);
            }
            return response()->json('Usuario no registrado', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 401);
        }
    }
}
