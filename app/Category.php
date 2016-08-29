<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
 public function types()
 {
 	return $this->hasMany('App\Types')->withPivot('ads_title','ads_content','ads_image')->withTimestamps();
 }
 protected $fillable = ['name'];
    //
}
