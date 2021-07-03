<?php


namespace App\QueryFilter;


class Search extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (empty($q))
        {
            return $builder;
        }

        if (request()->is([
            'admin/posts*'
        ]))
        {
            return $builder->where('title','like','%'.$q.'%');
        }

        if (request()->is([
            'admin/users*'
        ]))
        {
            return $builder->where('name','like','%'.$q.'%')
                ->orWhere('email','like','%'.$q.'%');
        }

        return $builder;
    }
}
