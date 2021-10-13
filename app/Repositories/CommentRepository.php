<?php


namespace App\Repositories;


use App\Models\Comment;
use App\Traits\FindAbleTrait;


class CommentRepository extends BaseRepositories implements \App\Contracts\CommentContract
{
    /**
     * @param Comment $model
     * @param array $filters
     */
    public function __construct(Comment $model, array $filters = [])
    {
        parent::__construct($model, $filters);
    }

    /**
     * @inheritDoc
     */
    public function new(array $data)
    {
        return auth()->user()
            ->comments()
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
        $comment = $this->findOneById($id, [], ['*'], ['authUser']);
        return $comment->delete();
    }

    /**
     * @inheritDoc
     */
    public function count(array $scopes = [])
    {
        return Comment::scopes($scopes)
            ->count();
    }

}
