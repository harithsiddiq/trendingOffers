<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['full_url'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    // Accessor to get full URL
    public function getFullUrlAttribute()
    {
        return asset('storage/store_images/' . basename($this->image_url));
    }
}
