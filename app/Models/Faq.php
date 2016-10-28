<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Faq extends Model
{  
	public $table = 'faqs';
    
	public $fillable = [
	    'question',
		'answer',
		'key1',
		'key2',
		'key3'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'question' => 'string',
		'answer'   => 'string',
		'key1'     => 'string',
		'key2'     => 'string',
		'key3'     => 'string'
    ];

	public static $rules = [
	    'question' => 'required',
		'answer'   => 'required',
		'key1'     => 'required'
	];
}
