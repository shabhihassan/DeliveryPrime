<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'business_id',
        'cost',
        'description',
        'image'

    ];


    public function bill(){
        return $this->belongsToMany(Bill::class)->withPivot('quantity');
    }

//    public function bill(){
//        return $this->morphedByMany(Bill::class, 'bill_dishes');
//    }

    protected $table = 'dishes';
}
