<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Triats\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;
    public function login(LoginUserRequest $request){
        $request->validated($request->all());
        if(!Auth::attempt($request->only('email','password'))){
            return $this->Error('No Data to Show','credentials do not match',401);
        }
        $user = User::where('email',$request->email)->first();

        return $this->Success([
            'user'=>$user,
            'token'=>$user->createToken('Api token of '.$user->name)->plainTextToken,
        ]);
    }
    public function register(StoreUserRequest $request){

        $request->validated($request->all());
        $user =User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return $this->Success([
            'user'=>$user,
            'token'=>$user->createToken('Api token of '.$user->name)->plainTextToken,
        ]);
    }
    public function logout(){
        Auth::user()->currentAccessToken()->delete();



        return $this->Success('','GoodBye, You are now loged out from the system and your token was deleted');
    }
}
