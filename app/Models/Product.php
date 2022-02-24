<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
                'pro_slug_en',
                'pro_slug_hin',
            ];

    public function image()
    {
       return $this->belongsTo(MultiImg::class, 'product_id', 'id');
    }

}
