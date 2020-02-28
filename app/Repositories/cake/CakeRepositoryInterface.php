<?php

namespace App\Repositories\cake;


interface CakeRepositoryInterface
{
    public function getAllCake();
    public function getByCategory($id);
    
}
