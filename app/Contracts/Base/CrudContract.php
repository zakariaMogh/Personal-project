<?php


namespace App\Contracts\Base;


interface CrudContract
{

    /**
     * @param $id
     * @param array $relations
     * @param array $columns
     * @param array $scopes
     * @return mixed
     */
    public function findOneById($id, array $relations = [],array $columns = [], array $scopes = []);

    /**
     * @param int $per_page
     * @param array $relations
     * @param array $columns
     * @param array $scopes
     * @return mixed
     */
    public function findByFilter($per_page = 10, array $relations = [],array $columns = [], array $scopes = [] );

    /**
     * @param array $data
     * @return mixed
     */
    public function new(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param array $scopes
     * @return mixed
     */
    public function count(array $scopes = []);
}
