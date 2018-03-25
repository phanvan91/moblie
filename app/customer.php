<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
  protected $table = 'customers';
  protected $fillable = ['name','email','sodienthoai'];
  public function chitietdonhang(){
    return $this->hasMany(chitietdonhang::class);
  }
}
