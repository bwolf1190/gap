<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Zip extends Model
{ 
	public $table = 'zips';
    
	public $fillable = [
	    'zip',
		'ldc_id'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'zip'    => 'string',
		'ldc_id' => 'string'
    ];

	public static $rules = [
	    'zip'    => 'required',
		'ldc_id' => 'required'
	];


	public function ldc(){
		return $this->belongsTo('App\Models\Ldc');
	}
}
