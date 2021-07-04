<?php


namespace App\Repositories;


use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;

class UserRepository extends BaseRepositories implements \App\Contracts\UserContract
{
    use UploadAble;
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
        if (array_key_exists('pic',$data) && $data['pic'] instanceof UploadedFile)
        {
            $data['pic'] = $this->uploadOne($data['pic'],'user');
        }
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $user = $this->findOneById($id);

        if (array_key_exists('pic',$data) && $data['pic'] instanceof UploadedFile)
        {
            if ($user->pic)
            {
                $this->deleteOne($id);
            }
            $data['pic'] = $this->uploadOne($data['pic'],'user');
        }

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

        if ($user->pic)
        {
            $this->deleteOne($user->pic);
        }

        return $user->delete();
    }

}
