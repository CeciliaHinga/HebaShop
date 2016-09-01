<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
	protected $table = 'category_types';
	protected $fillable = ['category_id',
	'type_id',
	'ads_image',
	'ads_content',
	'ads_title',
	'ads_price',
	'is_active',
	'is_featured',
	'image_path',
    'image_extension',
	];
   //
}
