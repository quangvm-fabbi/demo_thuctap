<?php

namespace App\Repositories\Permission;

use App\Models\Permission;
use App\Repositories\BaseRepository;

class  PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function getModel()
    {
        return Permission::class;
    }

}
