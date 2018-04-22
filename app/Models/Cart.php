<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Cart\Storage\SessionStore;
use App\Services\Session;
use Cart\Cart as MCart;

class Cart extends Model implements \JsonSerializable
{
    protected $fillable = [
        'user_id',
        'cart',
    ];

    public $items = [];

    protected $casts = [
        'cart' => 'array',
        'created_at' => 'date'
    ];

    public function add(CartItem $item)
    {

        if ($this->itemExists($item)) {
            return array_map(function($it) use ($item) {
                if ($item->id == $it->id) {
                    $it->quantity += $item->quantity;
                    return $it;
                }
            }, $this->items);
        } else {

            $this->items[] = $item;
        }


        return $this;
    }

    public function itemExists(CartItem $item)
    {
        foreach($this->items as $index => $value) {
            if ($item->id == $value->id) {
                return true;
            }
        }
    }

    public function make($id, Item $item)
    {
        if (Session::get($id)) {
            $cart = Session::get($id);
            $cart->add(new CartItem($item));
            dd($cart->items);
        }
        $cart = $this->add(new CartItem($item));

        // saves state in session
        $cart->persistToSession($id);

        dd($cart->items);
    }

    public function persistToSession($id)
    {
        return Session::set($id, $this);
    }

    public function persistToDb()
    {
        $this->user_id = Auth::id();
        $this->cart = json_encode(Session::get(md5(Auth::id()))->toArray());

        return $this->save();
    }

    public function remove($itemId)
    {
        return Arr::pull($this->items, $this->find($itemId));
    }

    public function find($itemId)
    {
        foreach($this->items as $index => $val) {
            if ($val->id == $itemId) {
                return $index;
            }
        }
    }

    public function toCollection()
    {
        return new Collection($this->items);
    }

    // public function toJson()
    // {
    //     return json_encode([
    //         'owner' => $this->user_id,
    //         'cart' => $this->cart,
    //         'created_on' => $this->created_at
    //     ]);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}