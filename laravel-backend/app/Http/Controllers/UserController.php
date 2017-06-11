<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;


class UserController extends Controller
{
  public function signup(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required'
    ]);

    $user = new User([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password'))
    ]);
    $user->save(); // store it in the database (users table)
    Auth::login($user);
    return response()->json([
      'message' => 'Successfully created user!'
    ],201);
  }

  public function signin(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);

    $credentials = $request->only('email','password');

    $user = User::where('email','=',$request->input('email'))->first(); // added

    try {
      if (!$token = JWTAuth::attempt($credentials)){
        return response()->json(['error' => 'Invalid User!'],401);
      }
    } catch ( JWTException $e){
      return response()->json(['error' => 'Could not create token'],500);
    }
    // $user = JWTAuth::parseToken()->toUser();
    return response()->json([
      'token' => $token,
      'name' => $user->name],
      200);
  }
  public function logout(Request $request)
  {
    $token = JWTAuth::getToken();
    if ($token) {
    JWTAuth::setToken($token)->invalidate();
    }
    return response()->json(['message' => 'User logged out'], 200);
  }

  public function loggedIn()
  {
    if (Auth::check()){
      $user = JWTAuth::parseToken()->toUser();
      return response()->json(['logged' => true, 'user' => $user], 200);
    } else {
      return response()->json(['logged' => false], 200);
    }
  }

}
