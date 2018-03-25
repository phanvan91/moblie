<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','slug','priceold','pricesale','description','content','image','user_id','category_id','cpu','tocdocpu','ram','odia','dungluongodia','chipsetdohoa','kichthuocmanhinh','dophangiai','hedieuhanh','dungluongpin','cameratruoc','camerasau','bangtang4g','bluetooth'];
    public function category(){
      return $this->belongsTo(Category::class);
    }
    public function imagedetail(){
      return $this->hasMany(ProductDetailImage::class);
    }
}
