<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $total_posts = Post::count();
        $total_tags  = Tag::count();

        return view('home', compact('total_users', 'total_posts', 'total_tags'));
    }
}
