<?php

namespace App\Http\Auth;

use App\Http\Auth\AuthRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $repository;
    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }
    public function register($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|unique:users',
            'name' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);
        if ($validator->fails()) {
            return ['msg'=>$validator->messages()->first(),'status'=>403];
        }else{
            $res = $this->repository->storeData($request->all());
            return ['msg'=>'Added Successfully!','status'=>200];
        }
    }
    public function authenticate($request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            return ['status'=>200,'msg'=>'Successful!'];
        }
        return ['status'=>401,'msg'=>'Invalid credentials'];
    }
    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return 200;
    }
}
