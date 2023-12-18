<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Resources\UserResource;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        if(auth()->attempt($request->only(['name','password']))){
            $currentUser = auth()->user();
            return response()->json(['message' => 'Login Berhasil', $currentUser, 201]);
        }else{
            return response()->json('eror');
        }      
    }
    public function Logout()
    {
        return 'cek logout';
    }
    public function Forget()
    {
        return 'cek forget';
    }
    public function Register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(80),
        ]);

        return response()->json(['message' => 'Registrasi berhasil', 'user' => $user], 201);
        //new UserResource(return$user);
    }
    
}
