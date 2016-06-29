<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Test extends Model
{
    
	public $table = "tests";
    

	public $fillable = [
	    "name",
		"type"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
		"type" => "string"
    ];

	public static $rules = [
	    "name" => "required",
		"type" => "required"
	];

}
