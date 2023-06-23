<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'postal_code', 'phone', 'email', 'cartItems', 'total_price', 'optional_info', 'content'];
}
