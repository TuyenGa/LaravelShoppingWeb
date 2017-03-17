<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable  = ['name','keyword','description','prarent_id', 'created_at', 'updated_at'];
   // public $timestamps = true;

    public function Product()
    {
        return $this->hasMany('App\Product');
    }
}
