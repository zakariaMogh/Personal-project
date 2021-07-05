<?php


namespace App\QueryFilter;


use App\Models\Post;

class Category extends Filter
{

    protected function applyFilters($builder)
    {
        $category = request($this->filterName());
        if (empty($category)) {
            return $builder;
        }

        if ($builder->getModel() instanceof Post) {
            return $builder->whereHas('categories', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        return $builder;
    }
}
