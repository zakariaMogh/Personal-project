<?php


namespace App\Repositories;


use App\QueryFilter\Alphabetic;
use App\QueryFilter\Search;
use App\QueryFilter\Sort;
use Illuminate\Routing\Pipeline;

abstract class BaseRepositories
{
    private $base_filters = [
        Search::class,
        Sort::class,
        Alphabetic::class
    ];

    protected function applyFilter($query, $per_page = 10,array $filters = null){

        $filters = is_null($filters) ? $this->base_filters : array_merge($filters,$this->base_filters);

        $result = app(Pipeline::class)
            ->send($query)
            ->through($filters)
            ->thenReturn();

        return $per_page > 0 ? $result->paginate($per_page) : $result->get();
    }
}
