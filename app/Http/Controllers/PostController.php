<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function display(Request $request){
        $posts = Post::all();
        $request->session()->put([
            'studName'=>'Ooi Chi Zhe',
            'regNo'=>'10806121',
            'pincode'=>'822894']);
        return view("posts.index",['posts'=>$posts]);
    }

    public function createFeed(Request $request){
        // $request->validate([
        //     'title'=>'required',
        //     'content'=>'required',
        // ]);

        // $data = $request->all()
        $sessionData = $request->session()->all();

        Post::create([
            // 'studName'=> $request->studName,
            // 'regNo'=> $request->regNo,
            'studName' => $sessionData['studName'],
            'regNo' => $sessionData['regNo'],
            'title' => $request->title,
            'content' => $request->content,
            
        ]);

        $request->session()->flash('created','New feed created successfully');
        $posts = Post::all();
        return view('posts.index',['posts'=>$posts]);
    }
}
