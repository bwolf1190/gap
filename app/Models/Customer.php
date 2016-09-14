<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Customer extends Model
{
    
	public $table = "customers";
    

	public $fillable = [
	    "acc_num",
	    // Federal_Tax_Id_Num is here for P2C commercial enrollments ONLY
	    "Fed_Tax_Id_Num",
		"fname",
		"lname",
		"sa1",
		"sa2",
		"scity",
		"sstate",
		"szip",
		"ma1",
		"ma2",
		"mcity",
		"mstate",
		"mzip",
		"same_address",
		"email",
		"confirm_email",
		"phone",
		"promo",
		"enrollment_id",
		"plan_id",
		"cc"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "acc_num"       => "string",
		"fname"         => "string",
		"lname"         => "string",
		"sa1"           => "string",
		"sa2"           => "string",
		"scity"         => "string",
		"sstate"        => "string",
		"szip"          => "string",
		"ma1"           => "string",
		"ma2"           => "string",
		"mcity"         => "string",
		"mstate"        => "string",
		"mzip"          => "string",
		"same_address"  => "string",
		"email"         => "string",
		"confirm_email" => "string",
		"phone"         => "string",
		"promo"         => "string",
		"enrollment_id" => "integer",
		"plan_id"       => "integer",
		"cc"            => "string",
    ];

	public static $rules = [
	    "acc_num"       => "required",
		"fname"         => "required",
		"lname"         => "required",
		"sa1"           => "required",
		"scity"         => "required",
		"sstate"        => "required",
		"szip"          => "required",
		"ma1"           => "required",
		"mcity"         => "required",
		"mstate"        => "required",
		"mzip"          => "required",
		"email"         => "required",
		"confirm_email" => "required",
		"phone"         => "required"
	];

	
	public function enrollment(){
		return $this->hasOne('App\Models\Enrollment');
	}

	public function plan(){
		return $this->hasOne('App\Models\Plan');
	}
	

}
