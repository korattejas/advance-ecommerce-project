<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImg extends Model
{
    use HasFactory;
        public function multiimg()
        {
         return $this->belongsTo(Product::class,'product_id','id');
        }
}
