<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'login' => 'required|min:1|max:30',
            'password' => 'required|min:4|max:32'
        ]);
        if($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $user = User::where('login', $request->login)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Неверные учетные данные'
                ]);
            } else {
                $token = $user->createToken($user->login.'_Token')->plainTextToken;
                return response()->json([
                    'status' => 200,
                    'username' => $user->login,
                    'token' => $token,
                    'message' => 'Авторизация прошла успешно'
                ]);
            }
        }
    }

    public  function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Выход успешно выполнен'
        ]);
    }
}
