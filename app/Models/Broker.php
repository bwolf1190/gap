<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Broker extends Model
{
    
	public $table = 'brokers';
    

	public $fillable = [
	    'name',
		'promo',
		'agent_code',
		'sub_agent_code'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'     		 => 'string',
		'promo'    		 => 'string',
		'agent_code'     => 'string',
		'sub_agent_code' => 'string'
    ];

	public static $rules = [
	    'name' => 'required',
		'promo'   => 'required'
	];

	public function ldcs(){
		return $this->belongsToMany('App\Models\Ldc');
	}

}
