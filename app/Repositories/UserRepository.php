<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Http\UploadedFile;

class UserRepository extends BaseRepositories implements \App\Contracts\UserContract
{
    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [], array $columns = ['*'], array $scopes = [])
    {
        return User::with($relations)->select($columns)->scopes($scopes)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter($per_page = 10, array $relations = [], array $columns = ['*'], array $scopes = [])
    {
        $query = User::with($relations)->select($columns)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page);
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
