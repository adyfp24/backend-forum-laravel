<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function Login()
    {
        return 'cek login';
    }
    public function Logout()
    {
        return 'cek logout';
    }
    public function Register()
    {
        return 'cek regist';
    }
    public function Forget()
    {
        return 'lupa pass';
    }
    
}
