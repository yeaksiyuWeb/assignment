<?php
namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function showStudentLoginForm(){
        return view('auth.login', ['url' => 'student']);
    }

    public function studentLogin(Request $req){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        return view('home.blade.php');
    }
}
