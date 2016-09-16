<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Ldc extends Model
{
    
	public $table = 'ldcs';
    

	public $fillable = [
	    'ldc',
        'customer_identifier',
        'format_criteria_1',
        'format_criteria_2',
        'hint'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ldc' => 'string',
        'customer_identifier' => 'string',
        'format_criteria_1' => 'string',
        'format_criteria_2' => 'string',
        'hint'
    ];

	public static $rules = [
	    'ldc' => 'required'
	];

    public function zip(){
        return $this->hasMany('App\Models\Zip');
    }

    public function brokers(){
        return $this->belongsToMany('App\Models\Broker');
    }

}
