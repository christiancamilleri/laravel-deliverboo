<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'postal_code', 'vat_number', 'logo', 'cover'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
