<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Customer extends Model
{ 
	public $table = 'customers';
    
	public $fillable = [
		'status',
	    	'acc_num',
	    	// Federal_Tax_Id_Num is here for P2C commercial enrollments ONLY
	    	'Fed_Tax_Id_Num',
		'fname',
		'lname',
		'sa1',
		'sa2',
		'scity',
		'sstate',
		'szip',
		'ma1',
		'ma2',
		'mcity',
		'mstate',
		'mzip',
		'same_address',
		'email',
		'confirm_email',
		'phone',
		'terms_conditions',
		'optin',
		'promo',
		'plan_id',
		'plan_description',
		'cc'
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		'status'           => 'string',
		'acc_num'          => 'string',
		'fname'            => 'string',
		'lname'            => 'string',
		'sa1'              => 'string',
		'sa2'              => 'string',
		'scity'            => 'string',
		'sstate'           => 'string',
		'szip'             => 'string',
		'ma1'              => 'string',
		'ma2'              => 'string',
		'mcity'            => 'string',
		'mstate'           => 'string',
		'mzip'             => 'string',
		'same_address'     => 'string',
		'email'            => 'string',
		'confirm_email'    => 'string',
		'phone'            => 'string',
		'terms_conditions' => 'string',
		'optin'            => 'string',
		'promo'            => 'string',
		'plan_id'          => 'integer',
		'plan_description' 	=> 'string',
		'cc'               => 'string',
    ];

	public static $rules = [
	    	'acc_num'       => 'required',
		'fname'         => 'required',
		'lname'         => 'required',
		'sa1'           => 'required',
		'scity'         => 'required',
		'sstate'        => 'required',
		'szip'          => 'required',
		'ma1'           => 'required',
		'mcity'         => 'required',
		'mstate'        => 'required',
		'mzip'          => 'required',
		'email'         => 'required',
		'confirm_email' => 'required',
		'phone'         => 'required'
	];

	/* Relationship Functions */
	public function enrollment_p2c(){
		return $this->hasOne('App\Models\EnrollmentP2C');
	}

	public function enrollment(){
		return $this->hasOne('App\Models\Enrollment');
	}

	public function plan(){
		return $this->hasOne('App\Models\Plan');
	}

	/* Custom Scopes */
	public function getPlanDescription(){
		$plan = Plan::find($this->plan_id);

		if($plan->etf == 'Cancellation Fee Applies'){
			$etf = 'ETF';
		}
		else{
			$etf = 'NOETF';
		}

		$this->plan_description = $plan->ldc . substr($plan->name, 0, 1) . substr($plan->type, 0, 1)  . $plan->length . 'M' . substr($plan->rate, 3,4) . $etf . '_' . $plan->price_code;
		return $this->plan_description;
	}
}
