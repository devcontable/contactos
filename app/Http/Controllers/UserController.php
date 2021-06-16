<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)    
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        User::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Creado correctamente'
        ], 200);
    }

    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (!is_null($user) && Hash::check($request->password, $user->password)) 
        {
            //$user->api_token = Str::random(100);
            //$user->save();

            $token = $user->createToken('contactos')->accessToken;
            return response()->json([
                'res' => true, 
                'token' => $token, 
                'message' => "Bienvenido al sistema"
            ],200);
        } 
        else
            return response()->json(['res' => false, 'message' => "Cuenta a password incorrectos"]);
    }


    public function logout(){
        $user = auth()->user();
        //$user->api_token = null;
        //$user->save();

        $user->tokens->each(function($token, $key){
            $token->delete();
        });
        return response()->json([
            'res' => true,             
            'message' => "Adios"
        ],200);
    }


}
