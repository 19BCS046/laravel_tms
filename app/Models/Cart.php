<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts'; // replace with your actual table name
    // Specify the fields that are mass assignable
    protected $fillable = [
        'image',
        'title',
        'location',
        'rating',
        'cost',
        'vehicle',
        'from',
        'to',
        'overview'
    ];
    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cart_users', 'touristcart_id', 'log_id');
    }

}
