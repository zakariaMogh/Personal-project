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

        return $builder;
    }
}
