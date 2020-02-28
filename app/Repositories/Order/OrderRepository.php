<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;

class  OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function getModel()
    {
        return Order::class;
    }

    public function getIndex()
    {
        return Order::paginate(5);
    }
}
