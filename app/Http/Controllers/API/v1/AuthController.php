<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(auth()->attempt($request->only(['name','password']))){
            $currentUser = auth()->user();
            return response()->json(['message' => 'Login Berhasil', $currentUser, 201]);
        }else{
            return response()->json('login gagal');
        }      
    }
    public function logout(Request $request)
    {
        $user = auth()->user();
        $user->api_token = Str::random(80);
        $user->save();
        return response()->json(['message' => 'Logout berhasil'], 200);
    }
    public function forget()
    {
        return 'cek forget';
    }
    public function register(Request $request)
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
