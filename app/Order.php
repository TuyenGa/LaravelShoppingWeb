<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'status',
        'total_qty',
        'total_price'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailOrder()
    {
        return $this->hasMany(DetailOrder::class);
    }



}
