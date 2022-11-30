<?php

namespace App\Models\Eloquent;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function apiToken()
    {
        return $this->api_token;
    }

    public function theme()
    {
        return $this->theme;
    }

    public function name()
    {
        return $this->name;
    }

    public function email()
    {
        return $this->email;
    }
}
