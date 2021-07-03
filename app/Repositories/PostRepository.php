<?php


namespace App\Repositories;


use App\Models\Post;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;

class PostRepository extends BaseRepositories implements \App\Contracts\PostContract
{
    use UploadAble;

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [], array $columns = ['*'], array $scopes = [])
    {
        return Post::with($relations)
            ->select($columns)
            ->scopes($scopes)
            ->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter($per_page = 10, array $relations = [], array $columns = ['*'], array $scopes = [])
    {
        $query = Post::with($relations)->select($columns)->scopes($scopes)->newQuery();
        return $this->applyFilter($query, $per_page);
    }


    /**
     * @inheritDoc
     */
    public function new(array $data)
    {
        if (array_key_exists('cover', $data) && $data['cover'] instanceof UploadedFile) {
            $data['cover'] = $this->uploadOne($data['cover'], 'post');
        }
        return Post::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $post = $this->findOneById($id);

        if (array_key_exists('cover', $data) && $data['cover'] instanceof UploadedFile) {
            if ($post->cover) {
                $this->deleteOne($post->cover);
            }
            $data['cover'] = $this->uploadOne($data['cover'], 'post');
        }

        $post->update($data);
        return $post;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        $post = $this->findOneById($id);
        if ($post->cover) {
            $this->deleteOne($post->cover);
        }

        return $post->delete();
    }

}
