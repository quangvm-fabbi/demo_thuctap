<?php

namespace App\Repositories\cake;

use App\Models\Cake;
use App\Http\Requests\CakeRequest;
use App\Repositories\cake\CakeRepositoryInterface;
use App\Repositories\BaseRepository;

class CakeRepository extends BaseRepository implements CakeRepositoryInterface
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function getModel()
    {
        return Cake::class;
    }

    public function getAllCake()
    {
        return Cake::with('images')->orderBy('id', 'DESC')->get();
    }

    public function allCake()
    {
        return Cake::paginate(10);
    }

    public function getByCategory($id)
    {
        return Cake::where('category_id',$id)->with('images')->get();
    }


}
