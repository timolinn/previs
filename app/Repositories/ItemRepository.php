<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Item;

class ItemRepository extends Repository implements RepositoryInterface
{
    /**
     * Instance of the item class
     *
     * @var App\Models\Item
     */
    protected $item;

    public function __construct(Item $item)
    {
        $this->item  = $item;
    }

    public function getAll(): Collection
    {
        return $this->item->all();
    }

    public function get($id): Collection
    {
        $item = $this->item->find($id);

        if ($item == null) return new Collection;

        return $this->parse($item->toArray());
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
