<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Plan extends Model
{
    
	public $table = "plans";
    

	public $fillable = [
		"priority",
	     "name",
		"ldc",
		"type",
		"length",
		"rate",
		"rate2",
		"etf",
		"meter",
		"promo",
		"code"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    	"priority" => "string",
        "name"   => "string",
		"ldc"    => "string",
		"type"   => "string",
		"length" => "string",
		"rate"   => "string",
		"rate2"   => "string",
		"etf"    => "string",
		"meter"  => "string",
		"promo"  => "string",
		"code"   => "string"
    ];

	public static $rules = [
		"priority"   => "required",
	    "name"   => "required",
		"ldc"    => "required",
		"type"   => "required",
		"length" => "required",
		"rate"   => "required",
		"etf"    => "required",
		"code"   => "required"
	];

	public function enrollment(){
		return $this->hasMany('App\Models\Enrollment');
	}

	public function customer(){
		return $this->hasMany('App\Models\Customer');
	}

}
