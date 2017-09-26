<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaapMessage extends Model
{
    public $table = 'gaap_messages';

    public $timestamps = false;

    public $fillable = [
    	'agent',
    	'email',
    	'message',
    	'created_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    
    protected $casts = [
    	'agent'	=> 'string',
    	'email'	=> 'string',
    	'message'	=> 'string',
    	'created_at' => 'string'
    ];

    public static $rules = [
    	'message'	=> 'required'
    ];


}
