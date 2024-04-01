<?php
namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ],[
            'username.required' => 'Please enter your username',
            'password.required' => 'Please enter you password.',
            'password.min' => 'Password must be at least :min characters long.',
        ]);
        return view('home.blade.php');
    }
    
    public function showStudentLoginForm()
    {
        return view('auth.login', ['url' => 'student']);
    }

    public function studentLogin(Request $request)
    {
        $request->validate([
            'regNo' => 'required|numeric',
            'password' => 'required|min:6'
        ],[
            'regNo.required' => 'Please enter your student registration number',
            'regNo.numeric' => 'Registration number must be numeric.',
            'password.required' => 'Please enter you password.',
            'password.min' => 'Password must be at least :min characters long.',
        ]);
        return view('home.blade.php');
    }
}