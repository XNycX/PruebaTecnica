<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //CRUD USER
    public function getAll()
    {
        try {
            $users = User::all();
            Log::info('get all users done');
            $data = [
                'data' => $users,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function getUserById($id)
    {
        try {
            $user = User::find($id);
            Log::info('get user done');
            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function createUser(Request $request)
    {
        try {
            $user = new User();
            $user->nombre = $request->nombre;
            $user->email = $request->email;
            $user->contraseña = $request->contraseña;
            $user->telefono =
            $request->telefono;
            $user->codigo = $request->codigo;
          
            $user->save();
            Log::info('create user done');
            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function updateProfile(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->nombre = $request->nombre;
            $user->email = $request->email;
            $user->contraseña = $request->contraseña;
            $user->telefono =
            $request->telefono;
            $user->codigo = $request->codigo;
            $user->save();
            Log::info('update user done');
            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function removeUser($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            Log::info('delete user done');
            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }


}
