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

    public function create(array $data): Collection
    {
        try {

            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->cart = json_encode($data['cart']);
            $cart->save();


            $this->order->user_id = Auth::id();
            $this->order->cart_id = $cart->id;
            // $this->order->eta = $data['eta'];

            $this->order->save();

            return $this->parse($this->order->toArray());

        } catch(\Exception $e) {
            return new Collection(['error' => $e->getMessage() ]);
        }

    }

    public function update(array $data): Collection
    {

    }

    public function delete($id): bool
    {

    }
}
