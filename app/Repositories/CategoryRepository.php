<?php


namespace App\Repositories;


use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepositories implements \App\Contracts\CategoryContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [], array $columns = ['*'], array $scopes = [])
    {
        return Category::with($relations)
            ->select($columns)
            ->scopes($scopes)
            ->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter($per_page = 10, array $relations = [], array $columns = ['*'], array $scopes = [])
    {
        $query = Category::with($relations)->select($columns)->scopes($scopes)->newQuery();
        return $this->applyFilter($query, $per_page);
    }


    /**
     * @inheritDoc
     */
    public function new(array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        return Category::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $category = $this->findOneById($id);
        $data['slug'] = Str::slug($data['name']);
        $category->update($data);
        return $category;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        $category = $this->findOneById($id);
        return $category->delete();
    }

    /**
     * @inheritDoc
     */
    public function count(array $scopes = [])
    {
        return Category::scopes($scopes)
            ->count();
    }

}
