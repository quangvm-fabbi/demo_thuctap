<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Models\User;
use App\Repositories\BaseRepository;

class  RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function getModel()
    {
        return Role::class;
    }

}
