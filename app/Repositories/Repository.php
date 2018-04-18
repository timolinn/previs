<?php

namespace App\Repositories;

use Illuminate\Support\Collection;


abstract class Repository
{
    public function parse(array $data): Collection
    {
        return new Collection($data);
    }
}