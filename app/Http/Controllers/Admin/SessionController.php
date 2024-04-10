<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use Validator;

class SessionController extends Controller
{
    public function index(){

    }

    public function showSessionPage(){
        return view('admin/session');
    }

    public function getAll(){
        return Session::all();
    }

    public function delete($id){
        $session = Session::findOrFail($id);
        $session -> delete();
        return 204;
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
