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
		"etf_description",
		"meter",
		"promo",
		"code",
		"price_code"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    	"priority"        => "string",
        "name"            => "string",
		"ldc"             => "string",
		"type"            => "string",
		"length"          => "string",
		"rate"            => "string",
		"rate2"           => "string",
		"etf"             => "string",
		"etf_description" => "string",
		"meter"           => "string",
		"promo"           => "string",
		"code"            => "string",
		"price_code"      => "integer"
    ];

	public static $rules = [
		"priority"   => "required",
	    "name"       => "required",
		"ldc"        => "required",
		"type"       => "required",
		"length"     => "required",
		"rate"       => "required",
		"etf"        => "required",
		"code"       => "required",
		"price_code" => "required"
	];

	public function enrollment(){
		return $this->hasMany('App\Models\Enrollment');
	}

	public function customer(){
		return $this->hasMany('App\Models\Customer');
	}

}
