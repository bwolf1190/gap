<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class SubAgent extends Model
{
	public $table = 'sub_agents';
    
	public $fillable = [
	    'name',
	    'email',
	    'broker_id'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'     	=> 'string',
        'email'     => 'string',
        'broker_id' => 'integer'
    ];

	public static $rules = [
	    'name'    => 'required',
		'email'   => 'required'
	];

	public function broker(){
		return $this->belongsTo('App\Models\Broker');
	}
}