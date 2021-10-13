<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository extends BaseRepositories implements \App\Contracts\UserContract
{
    /**
     * @param User $model
     * @param array $filters
     */
    public function __construct(User $model, array $filters = [])
    {
        parent::__construct($model, $filters);
    }

    /**
     * @inheritDoc
     */
    public function new(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $user = $this->findOneById($id);

        if (isset($data['password']))
        {
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }

        $user->update($data);
        return $user;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        $user = $this->findOneById($id);

        return $user->delete();
    }



}
