<?php

namespace Golum\Models;

class User
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
     * Constructor
     *
     * @param array $userData
     */
    public function __construct(array $userData)
    {
        $this->firstName = $userData['firstName'];
        $this->lastName = $userData['lastName'];
        $this->userName = $userData['userName'];
        $this->email = $userData['email'];
        $this->password = $userData['password'];
    }

    /**
     * Gets the authenticated user's username
     *
     * @return string
     */
    public function username(): string
    {
        return $this->userName;
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
    public function orders():
    {
        $orders = Order::getAllMyOrders();

        return $orders;
    }

    public function myCart(): Collection
    {
        return Cart::getContent();
    }
}