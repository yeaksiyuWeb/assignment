<?php
namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Please enter your username',
            'password.required' => 'Please enter you password.',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/admin/course');
        }

        return back()->withInput($request->only('username')); 
    }
    
    public function showStudentLoginForm()
    {
        return view('auth.login', ['url' => 'student']);
    }

    public function studentLogin(Request $request)
    {
        $request->validate([
            'regNo' => 'required|numeric',
            'password' => 'required'
        ],[
            'regNo.required' => 'Please enter your student registration number',
            'regNo.numeric' => 'Registration number must be numeric.',
            'password.required' => 'Please enter you password.',
        ]);

        if (Auth::guard('student')->attempt(['regNo' => $request->regNo, 'password' => $request->password])) {
            return redirect()->intended('/student/course-registration');
        }

        return back()->withInput($request->only('regNo'));
    }


    public function logout(Request $request)
    {
        $role = null;

        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $role = 'admin';
        }

        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
            $role = 'student';
        }

        $request->session()->invalidate();
        
        if ($role === 'admin') {
            return $this->showAdminLoginForm(); 
        } elseif ($role === 'student') {
            return $this->showStudentLoginForm(); 
        }
    }

    
}