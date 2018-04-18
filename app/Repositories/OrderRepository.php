<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Order;

class OrderRepository extends Repository implements RepositoryInterface
{
    /**
     * Instance of the Order class
     *
     * @var App\Models\Order
     */
    protected $order;

    public function __construct(Order $order)
    {
        $this->order  = $order;
    }

    public function getAll(): Collection
    {
        return $this->order->all();
    }

    public function get($id): Collection
    {
        $order = $this->order->find($id);

        if ($order == null) return new Collection;

        return $this->parse($order->toArray());
    }

    public function create(array $data): bool
    {
        dd($data);
        $newItem = $this->order->create($data);

        dd($newItem);
    }

    public function update(array $data): Collection
    {

    }

    public function delete($id): bool
    {

    }
}
