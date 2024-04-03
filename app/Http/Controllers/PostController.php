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
}
