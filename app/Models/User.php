<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * User Firstname
     *
     * @var string
     */
    protected $firstName;

    /**
     * User Lastname
     *
     * @var string
     */
    protected $lastName;

    /**
     * User's unique username
     *
     * @var string
     */
    protected $userName;

    /**
     * User's email
     *
     * @var string
     */
    protected $email;

    /**
     * User's password
     *
     * @var string
     */
    private $password;

    /**
     * Mass Fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'first_name', 'last_name', 'email', 'isBanned', 'role_id',
            'recurrent_order_id'
    ];

    /**
     * Hidden properties
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Constructor
     *
     * @param array $userData
     */
    // public function __construct(array $userData)
    // {
    //     $this->firstName = $userData['firstName'];
    //     $this->lastName = $userData['lastName'];
    //     $this->userName = $userData['userName'];
    //     $this->email = $userData['email'];
    //     $this->password = $userData['password'];
    // }

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
        return $this->firstName . ' ' . $this->lastName;
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
}