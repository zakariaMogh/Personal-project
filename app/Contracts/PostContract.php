<?php


namespace App\Contracts;


use App\Contracts\Base\CrudContract;

interface PostContract extends CrudContract
{
    /**
     * @param $slug
     * @param array $relations
     * @param array $columns
     * @param array $scopes
     * @return mixed
     */
    public function findOneBySlug($slug, array $relations = [],array $columns = [], array $scopes = []);
}
