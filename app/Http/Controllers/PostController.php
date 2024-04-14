<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        $posts = Post::all();
        // return view("posts.index",['posts'=>$posts]);
        
        $postType = $request->postSelection ?? 'allPosts';

        
        if(Auth::guard('admin')->check()){
            return view("posts.adminPost",['posts'=>$posts, 'postType'=>$postType]);
        }

        if(Auth::guard('student')->check()){
            return view("posts.studentPost",['posts'=>$posts, 'postType'=>$postType]);
        }
        
    }

    public function create(Request $request){
        // $request->validate([
        //     'title'=>'required',
        //     'content'=>'required',
        // ]);

        // $data = $request->all()
        $sessionData = $request->session()->all();

        

        if(Auth::guard('student')->check()){
            Post::create([
                'author' => $sessionData['studName'],
                'regNo' => $sessionData['regNo'],
                'title' => $request->title,
                'content' => $request->content,
                
            ]);
        }

        if(Auth::guard('admin')->check()){
            Post::create([
                'author'=> 'Admin',
                'regNo'=> 'admin',
                'title' => $request->title,
                'content' => $request->content,
                
            ]);
        }

        $request->session()->flash('created','New feed created successfully');
        
        
        if(Auth::guard('admin')->check()){
            return redirect()->route('posts.admin.display');
        }

        if(Auth::guard('student')->check()){
            return redirect()->route('posts.student.display');
        }

        
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        // $post = Post::where('id', $id);

        $post->title = $request->title;
        $post->content = $request->content;
        
        // Update must save the changes to the database
        $post->save();

        $request->session()->flash('edited','Feed changed successfully');
        
        if(Auth::guard('admin')->check()){
            return redirect()->route('posts.admin.display');
        }

        if(Auth::guard('student')->check()){
            return redirect()->route('posts.student.display');
        }
    }

    public function destroy(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->delete();

        $request->session()->flash('deleted','Feed deleted successfully');
        
        if(Auth::guard('admin')->check()){
            return redirect()->route('posts.admin.display');
        }

        if(Auth::guard('student')->check()){
            return redirect()->route('posts.student.display');
        }
    }
}
