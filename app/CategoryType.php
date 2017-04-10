<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
	use ElasticquentTrait;
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
    protected $mappingProperties = array(
    'ads_image' => [
      'type' => 'string',
      "analyzer" => "standard",
    ],
    'ads_title' => [
      'type' => 'string',
      "analyzer" => "standard",
    ],
    'ads_content' => [
      'type' => 'text',
      "analyzer" => "stop",
    ],
  );
   public function user()
   {
   	return $this->belongsTo('App\User');
   }
}
