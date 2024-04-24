<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=['name','cost','image','Cate_id','amount'];
    public function Order()
    {
        return $this->belongsToMany(product::class,'product_order');
    }
    public function CateProduct()
    {
        return $this->belongsTo(product::class);
    }


}
