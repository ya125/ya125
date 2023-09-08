<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['id', 'product_id', 'user_id'];

    public function product() {
        return $this->belongsTo('App\Product');
    }

}
