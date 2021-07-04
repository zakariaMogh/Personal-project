<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = DB::table('users')->count();
        $posts_count = DB::table('posts')->count();
        $comments_count = DB::table('comments')->count();
        $categories_count = DB::table('categories')->count();

        $categories = Category::withCount('posts')->get();

        return view('admin.dashboard', compact('users_count', 'posts_count', 'comments_count', 'categories', 'categories_count'));


    }
}
