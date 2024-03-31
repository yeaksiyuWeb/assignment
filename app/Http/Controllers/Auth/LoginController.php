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
            'regNo' => 'required',
            'password' => 'required|min:6'
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
            'regNo' => 'required',
            'password' => 'required|min:6'
        ]);
        return view('home.blade.php');
    }
}