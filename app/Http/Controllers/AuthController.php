<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  public function login(Request $r) {
    $r->validate([
      'email'=>'required|email',
      'password'=>'required'
    ]);

    $u = \App\Models\User::where('email',$r->email)->first();

    if (!$u || !Hash::check($r->password,$u->password)) {
      throw ValidationException::withMessages(['email'=>'Credenciales inválidas']);
    }

    if (!$u->organization_id) {
      abort(403,'Usuario sin cliente asignado');
    }

    return [
      'token'=>$u->createToken('agrotrack')->plainTextToken,
      'user'=>$u
    ];
  }

  public function me(Request $r) {
    return $r->user();
  }

  public function logout(Request $r) {
    $r->user()->currentAccessToken()->delete();
    return ['ok'=>true];
  }
}

