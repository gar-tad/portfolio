<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'description'];

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function primaryImage()
    {
        return $this->media()->where('is_primary', true)->first();
    }
}
