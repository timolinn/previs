<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Item;

class AuthRepository extends Repository implements RepositoryInterface
{
    /**
     * Instance of the item class
     *
     * @var App\Models\AuthenticateUser
     */
    protected $auth;

    public function __construct(AuthenticateUser $auth)
    {
        $this->auth  = $auth;
    }

    public function getAll(): Collection
    {
        return $this->auth->all();
    }

    public function get($id): Collection
    {
        $auth = $this->auth->find($id);

        if ($auth == null) return new Collection;

        return $this->parse($auth->toArray());
    }

    public function create(array $data): bool
    {

    }

    public function update(array $data): Collection
    {

    }

    public function delete($id): bool
    {

    }
}
