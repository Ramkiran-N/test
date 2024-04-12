<?php

namespace App\Http\Auth;

use App\Http\Controllers\Controller;
use App\Http\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $service;
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }
    public function login()
    {
        return view('auth.login');
    }
    public function viewRegister()
    {
        return view('auth.register');
    }
    public function register(request $request)
    {
        try {
            $res = $this->service->register($request);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json(['status'=>500,'msg'=>'Sorry, something went wrong!']);
        }
    }
    public function index()
    {
        return view('superadmin.index');
    }
    public function authenticate(Request $request)
    {
        $res =  $this->service->authenticate($request);
        return response()->json($res);
    }
    public function logout(Request $request)
    {
        $res =  $this->service->logout($request);
        if($res === 200){
            return redirect()->back();
        }
    }
}
