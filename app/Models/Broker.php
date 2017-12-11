<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Broker extends Model
{  
	public $table = 'brokers';
    
	public $fillable = [
	    'name',
		'promo',
		'master_code',
		'agent_code',
		'sub_agent_code',
		'commission_type',
		'Commission_Unit_Num',
		'email'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		'name'            => 'string',
		'promo'           => 'string',
		'master_code'     => 'string',
		'agent_code'      => 'string',
		'sub_agent_code'  => 'string',
		'commission_type' => 'string',
		'Commission_Unit_Num' => 'string',
		'email'           => 'string'
    ];

	public static $rules = [
	    'name'    => 'required',
		'promo'   => 'required'
	];

	public function ldcs(){
		return $this->belongsToMany('App\Models\Ldc');
	}

	public function subAgent(){
		return $this->hasMany('App\Models\SubAgent');
	}
}
