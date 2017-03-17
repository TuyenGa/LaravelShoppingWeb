<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = "detailorder";

    protected $fillable = ['id_product','id_category','soluong','giasp','tong_giasp'];

    public $timestamp = false;

    public function hoadon(){
        return $this->belongsTo('App\Hoadon');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
