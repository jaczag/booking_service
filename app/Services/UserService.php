<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private User $user;

    public function __construct(User $user = null)
    {
        $this->user = $user ?: new User();
    }

    /**
     * @param array $data
     * @return UserService
     */
    public function assignData(array $data): UserService
    {
        $this->user->first_name = $data['first_name'];
        $this->user->last_name = $data['first_name'];
        $this->user->phone = $data['phone'];
        $this->user->password = Hash::make($data['password']);
        $this->user->email = $data['email'];
        $this->user->save();

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}

