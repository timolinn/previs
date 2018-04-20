<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
// use Illuminate\Database\Eloquent\Collection;


interface RepositoryInterface
{

    public function getAll(): Collection;

    public function get($id): Collection;

    public function create(array $data): Collection;

    public function delete($id): bool;

    public function update(array $data): Collection;

}