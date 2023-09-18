<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function like_exist($user_id, $product_id) {        
        return Like::where('user_id', $user_id)->where('product_id', $product_id)->exists();       
    }

    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo('App\User');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
