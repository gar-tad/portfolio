<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = ['path'];
    protected $appends = ['src'];
    public $timestamps = false;

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function getSrcAttribute()
    {
        return Storage::url($this->path);
    }
}
