<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Enrollment extends Model
{ 
	public $table = 'enrollments';
    
	public $fillable = [
	    'enroll_date',
		'confirm_date',
		'p2c',
		'customer_id',
		'plan_id',
		'confirmation_code',
		'status',
		'agent_code',
		'sub_agent_code',
		'type'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'enroll_date'             => 'string',
		'confirm_date'            => 'string',
		'p2c'                     => 'string',
		'customer_id'             => 'integer',
		'plan_id'                 => 'integer',
		'confirmation_code'       => 'string',
		'status'				  => 'string',
		'agent_code'			  => 'string',
		'sub_agent_code'		  => 'string',
		'type'		  			  => 'string',
    ];

	public static $rules = [
	    'enroll_date' => 'required'
	];
	
	public function plan(){
		return $this->belongsTo('App\Models\Plan');
	}

	public function customer(){
		return $this->belongsTo('App\Models\Customer');
	}
}
