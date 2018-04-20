<?php

namespace App\Providers;

use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * User to be authenticated or registered
     *
     * @var App\Models\User
     */
    protected $guest;

    protected $phpauth;

    protected $loginService;

    protected $resumeService;

    public function __construct(User $guest)
    {
        $this->guest = $guest;

        $this->getAuraAuthInstance();
    }

    public function register(array $data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $confirmedpassword = $data['password_confirmation'];

        if ($password !== $confirmedpassword) throw new \Exception('Password does not match');

        $params = [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'user_name' => $data['username'],
            'first_name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'phone_number' => $data['phonenumber'],
            'role_id' => 3
        ];
        // dd($params);
        try {
            $new = $this->guest->create($params);
        } catch (\Exception $e) {

            return $e->getMessage();
        }

        return $new;
    }

    public function login(array $data)
    {

        try {

            $auth = app('authfactory')->newInstance();
            $result = $this->loginService->login($auth, [
                        'username' => $data['email'],
                        'password' => $data['password']
                        ]);

                        return $auth->getUserData();
        } catch (\Exception $e) {

            throw new \App\Exceptions\InvalidLoginException("Something happened, login failed", 12, $e);
        }
        // dd($result);
        throw new \App\Exceptions\InvalidLoginException("Something happened, login failed");
    }

    public function getAuraAuthInstance()
    {
        // get PDO database connection
        $adapter = app('connection')->getAuraPDOAdapter();
        // dd($pdo);

        // get AuraPHP login service
        $this->loginService = app('authfactory')->newLoginService($adapter);
        // $this->resumeService = app('authfactory')->newResumeService($adapter);
    }

}