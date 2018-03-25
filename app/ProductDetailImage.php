<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetailImage extends Model
{
    protected $table = 'product_detail_images';
    protected $fillable = ['image','product_id'];
    function product(){
      return $this->belongsTo(Product::class);
    }
}
