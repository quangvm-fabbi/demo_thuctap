<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class  UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function getModel()
    {
        return User::class;
    }

    public function uploadImage($image)
    {
        $imageName = time() . $image->getClientOriginalName();
        $imageType = $image->getClientOriginalExtension();
        $image->move(config('setting.avatar.user'), $imageName);

        return $imageName;
    }

    public function store($data)
    {
        return User::create($data);
    }

}
