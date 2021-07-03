<?php


namespace App\QueryFilter;


class Category extends Filter
{

    protected function applyFilters($builder)
    {
        $category = request($this->filterName());
        if (empty($category))
        {
            return $builder;
        }

        if (request()->is([
            'home'
        ]))
        {
            return $builder->whereHas('categories', function ($q) use($category)
            {
                $q->where('slug', $category);
        });
        }

        return $builder;
    }
}
