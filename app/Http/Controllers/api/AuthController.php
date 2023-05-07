<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Triats\HttpResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use HttpResponses;
    public function login(){
        return 'Fuck YOUUUUUUUUU';
    }
    public function register(){
        return response()->json('success y abn al3beta',200);
    }
    public function logout(){
        return response()->json('سلام يبن العبيطه',200);
    }
}
