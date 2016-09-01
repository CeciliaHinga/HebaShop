<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
 public function categories()
 {
 	return $this->belongsTo('App\Category')->withPivot('ads_title','ads_content','ads_image')->withTimestamps();
 }   //
 protected $fillable = ['ads_type',
 'type_id',
 'category_id',
 ];
}
