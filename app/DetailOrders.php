<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrders extends Model
{
    protected $table = 'detailOrders';
    protected $fillable = ['id_product','id_category','qty','total'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
