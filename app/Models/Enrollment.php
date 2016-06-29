<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Enrollment extends Model
{
    
	public $table = "enrollments";
    

	public $fillable = [
	    "enroll_date",
		"confirm_date",
		"p2c",
		"customer_id",
		"plan_id",
		"confirmation_code"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "enroll_date"             => "string",
		"confirm_date"            => "string",
		"p2c"                     => "string",
		"customer_id"             => "string",
		"plan_id"                 => "string",
		"confirmation_code"       => "string"
    ];

	public static $rules = [
	    "enroll_date" => "required",
		"p2c"         => "required",
		"status"      => "required"
	];
	public function plan(){
		return $this->belongsTo('App\Models\Plan');
	}

	public function customer(){
		return $this->belongsTo('App\Models\Customer');
	}

}
