<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Models\Student;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class PostPolicy
{
    use HandlesAuthorization;

    /*
    Admin and students are authorize to view all posts
     */
    public function viewAny()
    {
        return true;
    }

    /*
    Only student who created the posts can view the list of his posts
    */
    public function viewStudent(Student $student, Post $post)
    {
        return $student->regNo === $post->regNo;
    }

    public function viewAdmin(Admin $admin, Post $post)
    {
        return $admin->username === $post->regNo;
    }

    /*
    Admin and students are authorize to create posts
    */
    public function create()
    {
        return true;
    }

    /*
    Students are authorize to edit their own created post only
    */
    public function update(Student $student, Post $post)
    {
        return $student->regNo === $post->regNo;
    }

    /*
    Admin is authorize to edit his own created post only
    */
    public function updateByAdmin(Admin $admin, Post $post)
    {
        return $admin->username === $post->regNo;
    }

    /*
    Students are authorize to remove their own post only
    */
    public function delete(Student $student, Post $post)
    {
        
        return $student->regNo === $post->regNo;

    }

    /*
    Admin is authorize to remove all student's post
    */
    public function deleteByAdmin()
    {
        
        return Auth::guard('admin')->check();

    }

}
