<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    protected $username;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    public function findUsername(): string
    {
        $field = request()->input('email');
        $fieldType = filter_var($field, FILTER_VALIDATE_EMAIL) ? 'email': 'username';
        request()->merge([$fieldType => $field]);
        return $fieldType;
    }

    public function username(): string
    {
        return $this->username;
    }
}
