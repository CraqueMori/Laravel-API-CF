<?php

//3|ecjlztHsMgIh6Tu2LU6atk8Ikq2Q1DeG0gxsFVtt48932490

/*
  if you want to do access only have ALL the array abilities
  public function __construct(){
    $this->->middleware(['auth:sanctum', "abilities: check-payments, invoice-creator'])->only(["store", 'update'])
  if you want to do access to ONE of the array abilities
  $this->->middleware(['auth:sanctum', "ability: invoice-creator'])->only(["store", 'update'])
*/

//createToken() have 2 params, "permission name" and "Array Abilities"
//A good pratice is name Abilities with methods inside the responsible controller
//if you change "invoice-store" to something like "user-store" or "user-show", the created token will
//not have any of passed abilities


namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// 23|3EqyxJQPBQdVFedW4wTMXvVUuIo8N5sEwSOzGw50 -> invoice
// 24|og2oFelknKk5QNdLhmyHQ26hsSF8umPY7oyGEttT -> user
// 25|rqAUeXZnGQFRxvcd01moy7Jf5t593EuobJpNAieV -> teste

class AuthController extends Controller
{

    use HttpResponses;

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return $this->response('Authorized', 200, [
                'token' => $request->user()->createToken('invoice')->plainTextToken
            ]);
        }
        return $this->response('Not Authorized', 403);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->response('Token Revoked', 200);
    }
}
