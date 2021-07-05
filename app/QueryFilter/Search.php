<?php


namespace App\QueryFilter;


use App\Models\Post;
use App\Models\User;

class Search extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (empty($q))
        {
            return $builder;
        }


        if ($builder->getModel() instanceof Post)
        {
            return $builder->where('title','like','%'.$q.'%');
        }

        if ($builder->getModel() instanceof User)
        {
            return $builder->where('name','like','%'.$q.'%')
                ->orWhere('email','like','%'.$q.'%');
        }

        if (request()->is('user/categories'))
        {
            if ($builder->getModel() instanceof \App\Models\Category)
            {
                return $builder->where('name','like','%'.$q.'%');
            }
        }


        return $builder;
    }
}
