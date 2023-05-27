<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_id',
        'user_id',
        'total',
        'address',
        'Status',
        'subtotal',


    ];
//    public function dishes(){
//        return $this->morphedByMany(Dishes::class, 'bill_dishes');
//    }
    public function dishes(){
       return  $this->belongsToMany(Dishes::class, )->withPivot('quantity');
    }



    protected $table = 'bill';
}
