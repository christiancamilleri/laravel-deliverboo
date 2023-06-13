<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['date_time', 'name', 'email', 'postal_code', 'address'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
