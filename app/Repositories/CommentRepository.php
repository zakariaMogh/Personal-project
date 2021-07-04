<?php


namespace App\Repositories;


use App\Models\Comment;


class CommentRepository extends BaseRepositories implements \App\Contracts\CommentContract
{
    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [], array $columns = ['*'], array $scopes = [])
    {
        return Comment::with($relations)->select($columns)->scopes($scopes)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter($per_page = 10, array $relations = [], array $columns = ['*'], array $scopes = [])
    {
        $query = Comment::with($relations)->select($columns)->scopes($scopes)->newQuery();
        return $this->applyFilter($query, $per_page);
    }

    /**
     * @inheritDoc
     */
    public function new(array $data)
    {
        return auth()->guard('user')
            ->user()
            ->posts()
            ->attach($data['post'], ['content' => $data['content']]);;
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $comment = $this->findOneById($id);
        $comment->update($data);
        return $comment;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        if (auth()->guard('admin')->check())
        {
            $comment = $this->findOneById($id);

        }else{
            $comment = $this->findOneById($id, [], ['*'], ['authUser']);
        }
        return $comment->delete();
    }

}
