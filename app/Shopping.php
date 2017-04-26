<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shopping extends Model
{
	     protected $fillable = ['identifier', 'instance', 'content'];

	protected $table = 'shoppingcart';
       	// return $this->belongsTo('App\User');
}
