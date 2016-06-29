<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
    
	public $table = "users";
    

	public $fillable = [
	    "username",
		"password",
		"type"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "username"     => "string",
		"password"     => "string",
		"type"		   => "string"
    ];

	public static $rules = [
	    "username" => "required",
		"password"   => "required"
	];


}
