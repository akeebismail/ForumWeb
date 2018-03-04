<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $guarded = [];

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favorites(){
        return $this->morphMany(Favorite::class,'favorited');
    }
    public function favorite(){
        $artr = ['user_id'=>auth()->id()];
        if (! $this->favorites()->where($artr)->exists()){

            return $this->favorites()->create($artr);
        }
    }
}
