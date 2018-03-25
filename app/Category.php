<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','slug','parent_id','active'];
    public function product(){
      return $this->hasMany(Product::class);
    }
}
