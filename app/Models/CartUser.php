<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartUser extends Model
{
    use HasFactory;
    protected $table = 'cart_users';
    protected $fillable = ['log_id', 'touristcart_id'];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'touristcart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'log_id');
    }
}
