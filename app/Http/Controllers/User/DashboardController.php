<?php

namespace App\Http\Controllers\User;

use App\Contracts\CategoryContract;
use App\Contracts\CommentContract;
use App\Contracts\PostContract;
use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $post;
    protected $category;
    protected $comment;
    protected $user;

    public function __construct(PostContract $post, CategoryContract $category, CommentContract $comment, UserContract $user)
    {
        $this->post = $post;
        $this->category = $category;
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index()
    {
        $users_count = $this->user->count();
        $posts_count = $this->post->count(['authUser']);
        $comments_count = $this->comment->count(['authUser']);
        $categories_count = $this->category->count();

        $categories = $this->category->setPerPage(-1)->setCounts(['posts'])->findByFilter();

        return view('user.dashboard', compact('users_count', 'posts_count', 'comments_count', 'categories', 'categories_count'));


    }
}
