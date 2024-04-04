<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Validator;

class SessionController extends Controller
{
    public function index(){

    }

    public function showSessionPage(){
        $sessions = $this->getAll();
        return view('admin/session', ['sessions' => $sessions]);
    }

    public function getAll(){
        return Session::all();
    }

    public function save(Request $request){
        $request->validate([
            'session' => 'required'
        ]);
        $session = new Session;
        $currentDateTime = date("Y-m-d h:i:s"); 
        $session->created_at = $currentDateTime;
        $session->fill($request->all());
        $session->save();
        return redirect('/session');
    }
}
