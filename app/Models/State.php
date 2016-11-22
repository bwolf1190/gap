<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class State extends Model
{  
	public $table = 'states';
    
	public $fillable = [
	    'zip_prefix',
		'state_code',
		'state'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		'zip_prefix' => 'string',
		'state_code' => 'string',
		'state'      => 'string'
    ];

}
