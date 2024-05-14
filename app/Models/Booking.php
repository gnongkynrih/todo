<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getArrivalDateAttribute(){
        return date('d-m-Y',strtotime($this->arrival));
    }
    public function getDepartureDateAttribute(){
        return date('d-m-Y',strtotime($this->departure));
    }
}
