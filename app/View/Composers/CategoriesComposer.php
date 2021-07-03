<?php


namespace App\View\Composers;

use App\Contracts\CategoryContract;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CategoriesComposer
{
    public $category;

    public function __construct(CategoryContract $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $categories = $this->category->findByFilter();
        $view->with(['categories' => $categories]);
    }
}
