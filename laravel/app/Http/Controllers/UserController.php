<?php
namespace App\Http\Controllers;


use App\User;
use App\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function getDashboard()
  {
    $widgets = Widget::all();
    return view('dashboard.index', compact('widgets'));
  }

  public function postSignUp(Request $request)
  {
    // built-in function validate() -> create rules for validation user attributes //
    $this->validate($request, [
      'email' => 'required|email|unique:users',
      'username' => 'required|max:120',
      'password' => 'required|min:4'
    ]);

    $email = $request['email'];
    $username = $request['username'];
    $password = bcrypt($request['password']); //bcrypt hashes the password in the Database

    $user = new User();
    $user->email = $email;
    $user->username = $username;
    $user->password = $password;

    $user->save();

    Auth::login($user);

    return redirect()->route('dashboard');
  }

  public function postSignIn(Request $request)
  {
    $this->validate($request, [
      'email' => 'required',
      'password' => 'required'
    ]);

    if (Auth::guard('web')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
      return redirect()->route('dashboard');
    }
    return redirect()->back();
  }

  public function getLogout()
  {
    Auth::logout();
    return redirect()->route('home');
  }
}
