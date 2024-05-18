<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function getImageUrl(){
        return asset('storage/images'.$this->image);
    }
}
