<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
      return view('layouts.home');
    }
    public function about()
    {
      return view('layouts.about');
    }
    public function whyus()
    {
      return view('layouts.whyus');
    }
    public function category()
    {
      return view('layouts.category');
    }
    public function contact()
    {
      return view('layouts.contact');
    }

    //admin işlemleri

    public function login()
    {
      return view('admin.login');
    }

    public function logincheck(Request $request)
    {
      if ($request->isMethod('post')) {
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
          $request->session()->regenerate();
          return redirect()->intended('admin');
        }
        return back()->withErrors([
          'email' => 'error email',
        ]);
      }
      else {
        return view('admin.login');
      }
    }

    public function logout(Request $request)
    {
      Auth::logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('login');
    }
}
/*if($req->isMethod('post'))
{
  $credentials = $req->only('email','password');
  if (Auth::attempt($credentials)) {
      $req->session()->regenerate();

      return redirect()->intended('Admin');
  }
  return back()->withErrors([
    'email' => 'The provided credentials do not match our records',
  ]);
}
else {
  return view ('Admin.login');
} */
