<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'amount', 'text', 'image', 'user_id', 'del_flg'];

    public function cart() {
        return $this->hasMany('App\Cart');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function review() {
        return $this->hasMany('App\Review');
    }

    public function like() {
        return $this->hasMany('App\Like');
    }
}
