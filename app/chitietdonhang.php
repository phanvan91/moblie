<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
  protected $table = 'chitietdonhangs';
  protected $fillable = ['name','soluong','price','id_cus'];
  public function customer(){
    return $this->belongsTo(customer::class);
  }
}
