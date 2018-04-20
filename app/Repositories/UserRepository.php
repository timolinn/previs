<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Providers\AuthServiceProvider;

class UserRepository extends Repository implements RepositoryInterface
{
    /**
     * Instance of the User class
     *
     * @var App\Models\User
     */
    public $user;

    /**
     * AuthProivder Instance
     *
     * @var App\Providers\AuthServiceProvider
     */
    protected $provider;

    public function __construct(User $user, AuthServiceProvider $provider)
    {
        $this->user  = $user;
        $this->provider = $provider;
    }

    public function getAll(): Collection
    {
        return $this->user->all();
    }

    public function get($id): Collection
    {
        $user = $this->user->find($id);

        if ($user == null) return new Collection;

        // parse to a collection instance since an eloquent model
        // instanc eis returned
        return $this->parse($user->toArray());
    }

    public function create(array $data): Collection
    {
        $newU = $this->provider->register($data);

        if (!$newU instanceof User) return new Collection(['error' => $newU]);

        return $this->parse($newU->toArray());
    }

    public function update(array $data): Collection
    {

    }

    public function delete($id): bool
    {

    }

    public function loginUser(array $data): Collection
    {
        $login = $this->user->attemptLogin($data);
        // dd($login);
        if (!is_array($login)) return new Collection(['error' => $login]);

        return $this->parse($login);
    }
}
