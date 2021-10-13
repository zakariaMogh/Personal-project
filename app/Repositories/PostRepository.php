<?php


namespace App\Repositories;


use App\Models\Post;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class PostRepository extends BaseRepositories implements \App\Contracts\PostContract
{
    use UploadAble;

    /**
     * @param Post $model
     * @param array $filters
     */
    public function __construct(Post $model, array $filters = [])
    {
        parent::__construct($model, $filters);
    }


    /**
     * @inheritDoc
     */
    public function new(array $data)
    {
        if (array_key_exists('cover', $data) && $data['cover'] instanceof UploadedFile) {
            $data['cover'] = $this->uploadOne($data['cover'], 'post');
        }

        if (!isset($data['categories']))
        {
            $data['categories'] = [];
        }

        $data['slug'] = Str::slug($data['title']);
        $post = auth()->user()->posts()->create($data);
        $post->categories()->attach($data['categories']);
        return $post;
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $post = $this->findOneById($id, [], ['*'], ['authUser']);

        if (array_key_exists('cover', $data) && $data['cover'] instanceof UploadedFile) {
            if ($post->cover) {
                $this->deleteOne($post->cover);
            }
            $data['cover'] = $this->uploadOne($data['cover'], 'post');
        }

        if (!isset($data['categories']))
        {
            $data['categories'] = [];
        }

        $data['slug'] = Str::slug($data['title']);
        $post->update($data);

        $post->categories()->sync($data['categories']);
        return $post;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        $post = $this->findOneById($id, [], ['*'], ['authUser']);
        if ($post->cover) {
            $this->deleteOne($post->cover);
        }

        return $post->delete();
    }




}
