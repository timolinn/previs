<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Providers\AuthServiceProvider;
use Illuminate\Support\Collection;

class User extends Model
{
    /**
     * Mass Fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'first_name', 'last_name', 'phone_number', 'email', 'isBanned', 'role_id',
            'recurrent_order_id', 'password'
    ];

    /**
     * Hidden properties
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Gets the authenticated user's username
     *
     * @return string
     */
    public function username(): string
    {
        return $this->user_name;
    }

    /**
     * Returns the authenticated users fullname
     *
     * @return string
     */
    public function fullname(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Returns all the users orders ever made
     *
     * @return Collection
     */
    public function orders(): array
    {
        $orders = Order::getAllMyOrders();

        return $orders;
    }

    public function myCart(): array
    {
        return Cart::getContent();
    }

    public function attemptLogin(array $data)
    {
        try {

            $authProvider = new AuthServiceProvider($this);
            return $authProvider->login($data);

        } catch(\App\Exceptions\InvalidLoginException $e) {

            return $e->getMessage();
        }
    }

    public function make(Cart $cart)
    {
        $order = new Order;
        $order->user_id = Auth::id();
        $order->cart_id = $cart->id;

        if ($order->save()) {
            Notifier::notifyAdmin();
            Notifier::orderConfirmation($this, $order);
            return true;
        }

        return false;
    }

    public function isAdmin()
    {
        return $this->role->title == 'super_admin' || $this->role->title == 'admin';
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }


}