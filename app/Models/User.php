<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function productFeedbacks()
    {
        return $this->hasMany(ProductFeedback::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function favs()
    {
        return $this->hasMany(Fav::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
