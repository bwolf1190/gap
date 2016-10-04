<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Contact extends Model
{  
	public $table = 'contacts';
	
    public $timestamps = false;

	public $fillable = [
	    'name',
		'phone',
		'email',
		'question',
		'notes',
		'status'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'         => 'string',
		'phone'        => 'string',
		'email'        => 'string',
		'question'     => 'string',
		'notes'        => 'string',
		'status'       => 'string'
    ];

	public static $rules = [
	    'name'         => 'required',
		'email'        => 'required',
		'question'     => 'required'
	];
}
