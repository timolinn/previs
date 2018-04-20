<?php

namespace App\Controllers;

use App\Repositories\OrderRepository as OrdRep;
use Illuminate\Routing\Controller;
use PDC\Request;

class OrderController extends Controller
{
    /**
     * ItemRepository Instance
     *
     * @var \App\Repositories\OrderRepository
     */
    protected $ord;

    public function __construct(OrdRep $ord)
    {
        $this->ord = $ord;
    }

    public function getAllOrders()
    {
        return $this->ord->getAll();
    }

    public function getOrder($id)
    {
        $order = $this->ord->get($id);

        if (!empty($order->toArray())) {
            return $order;
        }

        return "Order not found!";
    }

    public function getCreate()
    {
        return renderView('orders.create');
    }

    public function getEdit()
    {
        return renderView('orders.edit');
    }

    public function createNewOrder(Request $pdcRequest)
    {
        // dd($pdcRequest->request->all());
        $new = $this->ord->create($pdcRequest->request->all());

    }

    public function updateOrder(Request $pdcRequest)
    {

    }

    public function deleteOrder($id)
    {

    }
}