<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login the user
     * 
     * @return void
     */
    public function login(Request $req){
        $data = $req->all();

        validator($data, [
            'email' => ['required', 'email'],
            'password' => 'required',
        ])->validate();

        $user = User::where('email', $data['email'])->first();
        if(password_verify($data['password'], $user->getAuthPassword())){
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }
    }

    /**
     * Logout the user, deleting the token
     * 
     * @return void
     */
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
    } 
}
