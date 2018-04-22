<?php

namespace App\Controllers;

use App\Repositories\OrderRepository as OrdRep;
use Illuminate\Routing\Controller;
use App\Services\Session;
use App\Services\Notifier;
use PDC\Request;
use App\Models\Auth;

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
        $orders = $this->ord->getAll();

        return renderView('orders.index', compact('orders'));
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
        $order = $this->ord->create($pdcRequest->request->all());

        if (arraY_key_exists('error', $order->toArray())) {
            Session::error($order->get('error'));
            // dd($order->get('error'));
            return redirectTo('orders/create');
        }

        Session::success("Your order was successful");
        Notifier::notifyAdmin(Auth::user(), $this->order->find($order->get('id')));

        return redirectTo('items');
    }

    public function updateOrder(Request $pdcRequest)
    {
        if (!Auth::user()->isAdmin()) {
            Session::error("You're not allowed to perform this action. What the heck? I'm messaging the admin!");
            return redirectTo('dashboard');
        }

        $order = $this->ord->update($pdcRequest->request->all());

        if (arraY_key_exists('error', $order->toArray())) {
            Session::error($order->get('error'));
            // dd($order->get('error'));
            return redirectTo('orders/create');
        }

        Session::success("Update successful");
        return redirectTo('orders');
    }

    public function deleteOrder($id)
    {

    }
}