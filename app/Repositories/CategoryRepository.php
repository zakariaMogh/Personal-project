<?php


namespace App\Repositories;


use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepositories implements \App\Contracts\CategoryContract
{

    /**
     * @param Category $model
     * @param array $filters
     */
    public function __construct(Category $model, array $filters = [])
    {
        parent::__construct($model, $filters);
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
